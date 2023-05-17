<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\User\FavoriteService;
use App\Http\Services\User\CartService;
use Illuminate\Http\Request;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\User\UserService;
use App\Http\Services\Admin\NewsService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;

class NewsController extends Controller
{
    protected $cartService;
    protected $cartService2;
    protected $categoryService;
    protected $productService;
    protected $userService;
    protected $newsService;

    public function __construct(FavoriteService $cartService,CartService $cartService2,CategoryService $categoryService,ProductService $productService,UserService $userService,NewsService $newsService)
    {
        $this->cartService2=$cartService2;
        $this->cartService=$cartService;
        $this->categoryService=$categoryService;
        $this->productService=$productService;
        $this->userService=$userService;
        $this->newsService=$newsService;
    }
    public function index(){
        $data=$this->userService->getUser();
        $categoryList=$this->categoryService->getCategoryList();
        $cartList=$this->cartService2->getCartList();
        $newsData=$this->newsService->getData();
        // dd($newsData);
        return view('user.news',compact(['newsData','cartList','categoryList','data']));
    }
    public function getNewsDetail(Request $request){
        $categoryList=$this->categoryService->getCategoryList();
        $cartList=$this->cartService2->getCartList();
        $newsData=$this->newsService->getData();
    
        $newsDetail=$this->newsService->getNewsDetail($request->id)[0];
        $data=$this->userService->getUser();
        $newsData=$this->newsService->getData();
        
        return view('user.news_detail',compact(['newsDetail','cartList','categoryList','data','newsData']));

    }
    public function delete( Request $request){
        $id=$request->id;
        if(!empty($id)){
            $this->cartService->delete($id);
        return redirect()->back();
        }
    }
    
    public function update( Request $request){
        $amount=$request->amount;
        $this->cartService->update($amount);
        return redirect()->route('user.cart.index');
    }
    public function add(Request $request){
        $product_id=$request->id;
        // dd($product_id);
    
        $dataInsert=$this->productService->getDetailProduct($product_id)[0];

            $this->cartService->add($dataInsert);
        

        return redirect()->route('user.favorite.index');
    }

}
