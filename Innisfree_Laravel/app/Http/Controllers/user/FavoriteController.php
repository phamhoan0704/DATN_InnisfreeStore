<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\User\FavoriteService;
use App\Http\Services\User\CartService;
use Illuminate\Http\Request;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    protected $cartService;
    protected $cartService2;
    protected $categoryService;
    protected $productService;
    protected $userService;
    public function __construct(FavoriteService $cartService,CartService $cartService2,CategoryService $categoryService,ProductService $productService,UserService $userService)
    {
        $this->cartService2=$cartService2;
        $this->cartService=$cartService;
        $this->categoryService=$categoryService;
        $this->productService=$productService;
        $this->userService=$userService;
    }
    public function index(){
        $cartList2=$this->cartService->getFavoriteList();
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();
        $cartList=$this->cartService2->getCartList();
        // if(Session::has('loginId')){
        //     $data=DB::table('users')->where('id','=',Session::get('loginId'))->first();
        // } else $cartList2=array();
        return view('user.favorite',compact(['cartList','cartList2','categoryList','data']));
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
