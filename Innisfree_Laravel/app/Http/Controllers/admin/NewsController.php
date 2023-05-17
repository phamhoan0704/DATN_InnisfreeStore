<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Services\User\FavoriteService;
use App\Http\Services\User\CartService;
use App\Http\Services\User\OrderService;

use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\Admin\NewsService;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userService;
    protected $newsService;
    public function __construct(CartService $cartService,CategoryService $categoryService, NewsService $newsService,UserService $userService)
    {
        $this->cartService=$cartService;
        $this->categoryService=$categoryService;
        // $this->orderService=$orderService;
        // $this->orderProductService=$orderProductService;
        $this->userService=$userService;
        // $this->productService=$productService;
        $this->newsService=$newsService;
    }
    public function index(Request $request)
    {
        $data=$this->userService->getUser();    
        $list=$this->newsService->getData();
        //Search 
        $search_txt=$request->search_txt;
        if(!empty($search_txt)){
            $resultSearch=$this->newsService->getSearch($search_txt);
        }
        else{
            return view('admin.news.news_list',compact(['data','list']));
        }
        return view('admin.news.news_list',compact(['list','data','resultSearch','search_txt']));
    }


    public function add()
    {
        $data=$this->userService->getUser();
        return view('admin.news.news_add',compact(['data']));
    }
    public function postAdd(Request $request)
    {
        // dd($request);
         $dataInsert=[
            'news_title'=>$request->news_title,
            'news_description'=>$request->content1,
            'news_content'=>$request->content,
            'news_image'=>"",
            'created_at'=>date('y-m-d'),
        ];
        $this->newsService->add($dataInsert);
        return redirect()->route('admin.news.index');
    }
    public function getEdit(News $id){

        $data=$this->userService->getUser();
        $detail=$id;
        
        return view('admin.news.news_edit',compact(['data','detail']));
    }
    public function postEdit(Request $request,$id){
        $data=[
            'news_title'=>$request->news_title,
            'news_description'=>$request->content1,
            'news_content'=>$request->content,
            'news_image'=>"",
            'created_at'=>date('y-m-d'),
        ];
        $this->newsService->updateNews($data,$id);
        return redirect()->route('admin.news.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
