<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Services\User\UserService;

class CategoryController extends Controller
{
    // private $categories;
    protected $categoryService;
    protected $userService;

    public function __construct(CategoryService $categoryService,UserService $userService)
    {
        // $this->categories=new Category();
        $this->categoryService=$categoryService;
        $this->userService=$userService;

    }
    public function index($name=0,Request $request){
        $countActive=$this->categoryService->getCount(1);
        $countHide= $this->categoryService->getCount(0);
        $countAll= $this->categoryService->getCount(-1);
        $count=[$countAll,$countActive,$countHide];
        $data=$this->userService->getUser();

        $filters=[];
        if(!empty($name)){
           if($name==='active'){
               $active=1;
            }else if($name=='hide'){ 
                $active=0;
            }
        $filters[]=['categories.active','=',$active];
        }
        $categoryList=$this->categoryService->getAllCategories($filters);
        //Search 
        $search_txt=$request->search_txt;
        if(!empty($search_txt)){
            $resultSearch=$this->categoryService->getSearchCategory($search_txt,$filters);
        }
        else{
            return view('admin.category.category_list',compact(['data','categoryList','count']));
        }
        return view('admin.category.category_list',compact(['data','categoryList','resultSearch','count','search_txt']));
    }

    public function create()
    {
        $data=$this->userService->getUser();
        return view('admin.category.categoryAdd',compact(['data']));
    }

    public function postAdd(CategoryRequest $request)
    {
         $dataInsert=[
            'category_name'=>$request->category_name,
            'created_at'=>date('y-m-d'),
        ];
        $this->categoryService->addcategory($dataInsert);
        return redirect()->route('admin.category.index');
    }

    public function getEdit(Category $id){
        $data=$this->userService->getUser();
        $categoryDetail=$id;
        return view('admin.category.categoryEdit',compact(['data','categoryDetail']));
    }

    public function postEdit(CategoryRequest $request,$id){
        $data=[
            'category_name'=>$request->category_name,
            'updated_at'=>date('y-m-d'),
        ];
        $this->categoryService->updateCategory($data,$id);
        return redirect()->route('admin.category.index');
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
            $this->categoryService->activeCategory($ids,$id,$active);
        }else{
            redirect()->back();
        }
        return redirect()->back();
    }


    public function destroy(Request $request){
        $category_id=$request->category_delete_id;
        if(!empty($category_id)){
            $this->categoryService->deleteCategory($category_id);

        }
        return redirect()->back();
    
        }
    
    // public function destroyAll(Request $request){
    //     $ids=$request->ids;
    //     if(!empty($ids)){
    //         $this->categories->deleteCategory2($ids);
    //     }
    //     else{
    //         redirect()->back();
    //     }
    //     return redirect()->back();
    // }





    // USER
    public function getAllCategories(){
     
        $categoryList=$this->categoryService->getAllCategories();
        
        return view('user.layout_user',compact(['categoryList']));
    }
}
