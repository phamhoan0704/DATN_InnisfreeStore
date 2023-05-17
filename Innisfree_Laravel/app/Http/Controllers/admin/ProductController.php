<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\AuthorService;
use App\Http\Services\Admin\ProductService;
use Illuminate\Http\Request;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\SupplierService;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Product;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Http\Services\User\UserService;


class ProductController extends Controller
{
    
    protected $productService;
    protected $userService;

    public function __construct(ProductService $productService,UserService $userService)
    {
        $this->productService=$productService;
        $this->userService=$userService;

    }
    public function index($name=0,Request $request){
        $data=$this->userService->getUser();

        $countActive= $this->productService->getCount(1);
        $countHide= $this->productService->getCount(0);
        $countAll= $this->productService->getCount(-1);
        $count=[$countAll,$countActive,$countHide];
        $filters=[];
        if(!empty($name)){
           if($name==='active'){
               $active=1;
            }else if($name=='hide'){ 
                $active=0;
            }
        $filters[]=['products.active','=',$active];
        }
        $productList=$this->productService->getAllCategories($filters);
        //Search  
        $search_txt=$request->search_txt;
        if(!empty($search_txt)){
            $resultSearch=$this->productService->getSearchProduct($search_txt,$filters);
        }
        else{
            return view('admin.product.product_list',compact(['data','productList','count']));
        }
        return view('admin.product.product_list',compact(['data','productList','resultSearch','count','search_txt']));
    }
    
    public function create(){
        $data=$this->userService->getUser();

        $cat=new CategoryService();
        $category=$cat->getCategory();
        $sup=new SupplierService();
        $supplier=$sup->getSupplier();
        // $aut=new AuthorService();
        // $author=$aut->getAuthor();
        return view('admin.product.productAdd',compact (['data','category','supplier']));
    }

    public function postAdd(ProductRequest $request){
      
        $image = $request->file('product_image')->getClientOriginalName();
        $file= $request->file('product_image');
        $file-> move(public_path('template/image/product_image'), $image);
         $dataInsert=[
            'product_name'=>$request->product_name,
            'product_year'=>$request->product_year,
            'product_price'=>$request->product_price,
            'product_price_pre'=>$request->product_price_pre,
            'product_image'=>$request->file('product_image')->getClientOriginalName(),
            'product_quantity'=>$request->product_quantity,
            'product_detail'=>$request->product_detail,
            'product_manual'=>$request->product_manual,
            'product_capacity'=>$request->product_capacity,
            'product_ingredient'=>$request->product_ingredient,
            'product_useNote'=>$request->product_useNote,
            'product_expiry'=>$request->product_expiry,
            'category_id'=>$request->category,
            'supplier_id'=>$request->supplier,
            'created_at'=>date('y-m-d'),
        ];
        $this->productService->addProduct($dataInsert);
        return redirect()->route('admin.product.index');
    }

    public function getEdit(Product $id){
        $data=$this->userService->getUser();
        
        $productDetail=$id;
        
        $cat=new CategoryService();
        $category=$cat->getCategory();
        $sup=new SupplierService();
        $supplier=$sup->getSupplier();
        // $aut=new AuthorService();
        // $author=$aut->getAuthor();
    //   dd($productDetail);
        return view('admin.product.productEdit',compact(['data','productDetail','category','supplier']));
    }

    public function postEdit(ProductRequest $request,$id){
    
        $image = $request->file('product_image')->getClientOriginalName();
        $file= $request->file('product_image');
        $file-> move(public_path('template/image/product_image'), $image);
         $data=[
            'product_name'=>$request->product_name,
            'product_year'=>$request->product_year,
            'product_price'=>$request->product_price,
            'product_price_pre'=>$request->product_price_pre,
            'product_image'=>$request->file('product_image')->getClientOriginalName(),
            'product_quantity'=>$request->product_quantity,
            'product_detail'=>$request->product_detail,
            'product_manual'=>$request->product_manual,
            'product_capacity'=>$request->product_capacity,
            'product_ingredient'=>$request->product_ingredient,
            'product_useNote'=>$request->product_useNote,
            'product_expiry'=>$request->product_expiry,
            'category_id'=>$request->category,
            'supplier_id'=>$request->supplier,
            'updated_at'=>date('y-m-d'),
        ];
        // dd($request);
        // dd($data);      
        $this->productService->updateProduct($data,$id);
        return redirect()->route('admin.product.index');
    }

    public function postActive(Request $request){
        $ids=$request->ids;  
        $id=$request->id;
        $name=$request->name;
        if($name=='show'){
            $active=1;
        }
        if($name=='hidden'){
            $active=0;
        }
        if(!empty($ids)||!empty($id)){
            $this->productService->activeProduct($ids,$id,$active);
        }else{
            redirect()->back();
        }
        return redirect()->back();
    }
    public function destroy(Request $request){
        $id=$request->delete_id;
        if(!empty($id)){
            $this->productService->deleteProduct($id);
        return redirect()->back();
        }
    }
    public function import_excel(Request $request){
        // $data=$request->file('file');
        // $nameFile=$data->getClientOriginalName();
        // Excel::import(new ProductImport, $request->file);
        // return redirect()->back();
       
         $this->validate($request, [
          'file'  => 'required|mimes:xls,xlsx'
         ]);
         
         $path = $request->file('file')->getRealPath();
          Excel::import(new ProductImport, $request->file);
        //  $data = Excel::load($path)->get();
        //  dd($data);
        //  if($data->count() > 0)
        //  {
        //   foreach($data->toArray() as $key => $value)
        //   {
        //    foreach($value as $row)
        //    {
        //     $insert_data[] = array(
        //         "product_name"=>$row['product_name'],
        //         "product_year"	=>$row['product_year'],
        //         "product_price"	=>$row['product_price'],
        //         "product_price_pre"=>$row['product_price_pre'],
        //         "product_image"	=>$row['product_image'],
        //         "product_detail"=>$row['product_detail'],
        //         "product_manual"=>$row['product_manual'],		
        //         "product_quantity"=>$row['product_quantity'],
        //         "active"	=>$row['active'],
        //         "category_id" =>$row['category_id'],
        //         "supplier_id" =>$row['supplier_id'],
        //         "product_capacity"=>$row['product_capacity'],
        //         "product_ingredient"=>$row['product_ingredient'],
        //         "product_useNote"=>$row['product_useNote'],
        //         "product_expiry"=>$row['product_expiry'],
        //     );
        //    }
        //   }
        //   dd($insert_data);
    
        //   if(!empty($insert_data))
        //   {
        //    DB::table('products')->insert($insert_data);
        //   }
        //  }
         return back()->with('success', 'Nhập dữ liệu từ file excel thành công');
        }
    
}
