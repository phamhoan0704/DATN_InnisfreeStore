<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\User\CartService;
use Illuminate\Http\Request;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\User\UserService;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cartService;
    protected $categoryService;
    protected $productService;
    protected $userService;
    public function __construct(CartService $cartService,CategoryService $categoryService,ProductService $productService,UserService $userService)
    {
        $this->cartService=$cartService;
        $this->categoryService=$categoryService;
        $this->productService=$productService;
        $this->userService=$userService;
    }
    public function index(){
        $cartList=$this->cartService->getCartList();
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();
        return view('user.cart',compact(['cartList','categoryList','data']));
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
        $check=false;
        foreach($amount as $key =>$item){
        $dataInsert=$this->productService->getDetailProduct($key)[0];
            if((int)$dataInsert->product_quantity>$item&&$item>0){
                $check=true;
            }else{
                $check=false;
            }
        }
        if($check==true){
            $this->cartService->update($amount);
        $check=false;
            
            return redirect()->route('user.cart.index');
        }else {
            return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ hoặc số lượng bạn nhập không chính xác. Vui lòng nhập lại!');
        }

    }
    public function add(Request $request){
        // dd("á");
        $product_id=$request->id;
        $numproduct=$request->numproduct;
        //dd($product_id);
        
         if(empty($numproduct))
         $numproduct=1;
        $dataInsert=$this->productService->getDetailProduct($product_id)[0];
        if((int)$dataInsert->product_quantity>$numproduct&&$numproduct>0){
            $this->cartService->add($dataInsert,$numproduct);
        }else{
            return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ hoặc số lượng bạn nhập không chính xác. Vui lòng nhập lại!');
        }

        return redirect()->route('user.cart.index');
    }

}
