<?php
namespace App\Http\Services\Admin;

use App\Models\Product;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductService{
    protected $table='products';
    public function getAllCategories($filters=[]){
        $category=DB::table($this->table)
        ->select('*');
        if(!empty($filters)){
            $category=$category->where($filters);
        }
        $category=$category->paginate(5);
        // dd($category);
        return $category;
    }
    public function getCount($x){
        $count=DB::table($this->table);
        if($x==1){
           $count=$count ->where('active','1');
        }elseif($x==0){
            $count=$count ->where('active','0');
        }
        $count=$count ->count();            
        return $count;
    }

    public function getSearchProduct($search_txt,$filters=[]){
        $category=DB::table($this->table)
        ->select('*');
        if(!empty($filters)){
            $category=$category->where($filters);
        }
        $category=$category
        ->where('product_name','like','%'.$search_txt.'%')
        ->get();
        if(empty($category[0])){
            $titleSearch=0;
            
        }else{
            $titleSearch= $category->count();
        }
        $resultSearch=[
            'listSearch'=>$category,
            'titleSearch'=>$titleSearch,
        ];

    return $resultSearch; 
    }

    public function addProduct($dataInsert){
    
        try{
            DB::table($this->table)->insert([
                'product_name'=>(string)$dataInsert['product_name'],
                'product_year'=>Carbon::parse($dataInsert['product_year'])->format('Y-m-d H:i:s'),
                'product_price'=>(double)$dataInsert['product_price'],
                'product_price_pre'=>(double)$dataInsert['product_price_pre'],
                'product_quantity'=>(double)$dataInsert['product_quantity'],
                'product_image'=>(string)$dataInsert['product_image'],
                'product_detail'=>(string)$dataInsert['product_detail'],
                'product_manual'=>(string)$dataInsert['product_manual'],
                'category_id'=>$dataInsert['category_id'],
                'product_capacity'=>(string)$dataInsert['product_capacity'],
                'product_ingredient'=>(string)$dataInsert['product_ingredient'],
                'product_useNote'=>(string)$dataInsert['product_useNote'],
                'product_expiry'=>Carbon::parse($dataInsert['product_expiry'])->format('Y-m-d H:i:s'),
                'supplier_id'=>$dataInsert['supplier_id'],
                'created_at'=>$dataInsert['created_at'],
                'active'=>'1',
            ]);
        
          
         session()->flash('success','Tạo sản phẩm mới thành công!');
        }catch(Exception $err){
            dd($err);
            session()->flash('error',$err);
            return false;
        }  
        return true;
    }
    public function updateProduct($data,$id){
        try{
            DB::table($this->table)
            ->where('id','=',$id)
            ->update([
                'product_name'=>(string)$data['product_name'],
                'product_year'=>Carbon::parse($data['product_year'])->format('Y-m-d H:i:s'),
                'product_price'=>(double)$data['product_price'],
                'product_price_pre'=>(double)$data['product_price_pre'],
                'product_quantity'=>(double)$data['product_quantity'],
                'product_image'=>(string)$data['product_image'],
                'product_detail'=>(string)$data['product_detail'],
                'product_manual'=>(string)$data['product_manual'],
                'product_capacity'=>(string)$data['product_capacity'],
                'product_ingredient'=>(string)$data['product_ingredient'],
                'product_useNote'=>(string)$data['product_useNote'],
                'product_expiry'=>Carbon::parse($data['product_expiry'])->format('Y-m-d H:i:s'),
                'category_id'=>$data['category_id'],
                'supplier_id'=>$data['supplier_id'],
                'updated_at'=>$data['updated_at'],
            ]);
            // dd("a");
            session()->flash('success','Cập nhật sản phẩm thành công!');
        }catch(Exception $err){
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
    public function activeProduct($ids,$id,$active){
        $product=DB::table($this->table);
        if(!empty($ids)){
            $product->whereIn('id',$ids);
        }
        if(!empty($id)){
            $product->where('id',$id); 
        }
        $product->update([
            "active"=>$active,
        ]);
        
    }
    public function updateQuantityOrder($cartList){
 
            
        try{
            foreach($cartList as $key=>$item){
              
                // dd($item[$key]->product_id);
                $product_quantity=DB::table($this->table)
                ->select('product_quantity')
                ->where('id',$item->product_id)
                ->first();
              $product_quantity=$product_quantity->product_quantity;
              $product_quantity-=$item->product_amount;
                DB::table($this->table)
                ->where('id',$item->product_id)
                ->update([
                    'product_quantity'=>(int)$product_quantity,
                ]);
            }
        }catch(Exception $err){
            dd($err);
            return false;
        }  
        return true;

    }
    public function checkProduct($product_id){
        try{
            $list=DB::table($this->table)
            ->join('order_product','order_product.product_id','product_id')
            ->where('product_id',$product_id)
            ->get();
            return count($list);
        }catch(Exception $err){
        dd($err);
            // session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
    public function deleteProduct($id)
    {
        if($this->checkProduct($id)>0){
            session()->flash('success','Sản phẩm này không thể xóa!');

        }else{
            try{
                DB::table($this->table)
                ->where('id',$id)
                ->delete();
                session()->flash('success','Xóa sản phẩm thành công!');
            }catch(Exception $err){
                session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
            }
        }

    }





    // USER
    public function getNewProduct($filters=[]){
        $category=DB::table($this->table)
        ->select('*')
        ->where('active','1')
        ->orderByDesc('product_year')->skip(0)->take(8)
        ->get();
        //dd($category);
        return $category;
    }
    public function getNewProduct2($filters=[]){
        $category=DB::table($this->table)
        ->select('*')
        ->where('active','1')
        ->orderByDesc('product_year')->skip(0)->take(4)
        ->get();
        //dd($category);
        return $category;
    }

    public function getListProductBestSeller($filters=[]){
        $reportList=DB::table('order_product')
        ->select('products.id','products.product_name','products.product_price','products.product_price_pre','products.product_quantity','products.product_image', DB::raw('SUM(order_product.product_amount) AS sale_amount'))
        ->join('products', 'order_product.product_id', '=', 'products.id')
        ->groupBy('products.id','products.product_name','products.product_price','products.product_price_pre','products.product_quantity','products.product_image')
        ->orderBy('sale_amount','desc')->skip(0)->take(10)
        ->get();
        return $reportList;
    }

    public function getListProductHotDeals($filters=[]){
        $reportList=DB::table('order_product')
        ->select('products.id','products.product_name','products.product_price','products.product_price_pre','products.product_quantity','products.product_image', DB::raw('(products.product_price / products.product_price_pre) AS discount'))
        ->join('products', 'order_product.product_id', '=', 'products.id')
        ->groupBy('products.id','products.product_name','products.product_price','products.product_price_pre','products.product_quantity','products.product_image')
        ->orderBy('discount')->skip(0)->take(10)
        ->get();
        return $reportList;
    }

    public function getProductByCategory($id){
        // dd($id);
        // dd(url()->full());
        // dd(url()->current());
        $product_list=DB::table('products')
        ->select('*')
        ->where('active','1');
        
        if($id != ''){       
            $product_list=$product_list->where('category_id','=',$id);
        }
        if( str_contains(url()->full(),'price-asc') ) {
            $product_list=$product_list->orderBy('product_price');
        }

        if( str_contains(url()->full(),'price-desc') ) {
            $product_list=$product_list->orderByDesc('product_price');
        }
        if( str_contains(url()->full(),'title-asc') ){
            $product_list=$product_list->orderBy('product_name');
        }

        if( str_contains(url()->full(),'title-desc') ){
            $product_list=$product_list->orderByDesc('product_name');
        }

        $product_list=$product_list->paginate(16);
        // dd($product_list);
        return $product_list;
    }

    public function searchProduct($search){
        $search_list=DB::table($this->table)
        ->select('*')
        ->where('product_name','like','%'.$search.'%');
        $search_list=$search_list->paginate(16);
        if($search == '') $search_list = array();
        return $search_list; 
    }

    public function getDetailProduct($product_id){
        $productDetail=DB::table($this->table)
        ->where('id',$product_id)
        ->get();
        return $productDetail;

    }
    public function updateQuantity($product_id,$quantity)
    {
        $num=DB::table($this->table)
        ->select('product_quantity')
        ->where('id','=',$product_id)->first();
        $total=$num->product_quantity+$quantity;
        DB::table($this->table)
        ->where('id',$product_id)
        ->update(['product_quantity'=>$total]);
    }


}