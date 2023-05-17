<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\CartService;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\User\OrderService;
use App\Http\Services\User\OrderProductService;

use App\Http\Requests\user\OrderRequest;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\User\UserService;

class OrderController extends Controller
{
    protected $cartService;
    protected $categoryService;
    protected $orderService;
    protected $orderProductService;
    protected $userService;
    protected $productService;


    public function __construct(CartService $cartService,CategoryService $categoryService,OrderService $orderService,OrderProductService $orderProductService,UserService $userService,ProductService $productService)
    {
        $this->cartService=$cartService;
        $this->categoryService=$categoryService;
        $this->orderService=$orderService;
        $this->orderProductService=$orderProductService;
        $this->userService=$userService;
        $this->productService=$productService;
    }
    public function index(){
        $cartList=$this->cartService->getCartList();
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();
        return view('user.order',compact(['cartList','categoryList','data']));
    }

    public function add(OrderRequest $request){
         $dataInsert=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'total_money'=>$request->total_money,
            'order_status'=>0,
            'note'=>$request->note,
            'delivery_money'=>$request->delivery_money,
            'payment_method'=>$request->payment,
            'created_at'=>date('y-m-d'),
        ];
        
        $order_id=$this->orderService->add($dataInsert);
        $cartList=$this->cartService->getCartList();
        $this->productService->updateQuantityOrder($cartList);
        $this->orderProductService->add($cartList,$order_id);
        $this->cartService->deleteCart();
        
        return redirect()->route('user.homepage');
    }
    public function getOrderDetail(Request $request){
        $order_id=$request->id;
        $orderDetail=$this->orderService->getOrderDetail($order_id)[0];
        $orderProductDetail=$this->orderProductService->getOrderProductList($order_id);
        $cartList=$this->cartService->getCartList();
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();
        return view('user.orderDetail',compact(['orderDetail','orderProductDetail','categoryList','data','cartList']));
    }

    public function getOrderList(){
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();

        $orderList=$this->orderService->getOrderList();
       
        return view('user.user_order_list',compact(['categoryList','orderList','data']));

    }
    public function OrderListActive(){
        $categoryList=$this->categoryService->getCategoryList();
        $data=$this->userService->getUser();
        $cartList=$this->cartService->getCartList();
        $orderList0=$this->orderService->getOrderListActive('0');
        $orderList1=$this->orderService->getOrderListActive('1');
        $orderList2=$this->orderService->getOrderListActive('2');
        $orderList3=$this->orderService->getOrderListActive('3');
        $orderList4=$this->orderService->getOrderListActive('4');
        return view('user.user_order_list',compact(['categoryList','orderList0','orderList1','orderList2','orderList3','orderList4','data','cartList']));
    }
    public function updateOrder(Request $request){
        
        try{
            $order_id=$request->id;
            $res=DB::table('orders')
            ->where('id',$order_id)
            ->update([
                 'order_status'=>$request->status
                 ]);   
        return redirect()->back()->with('success', 'Bạn đã hủy đơn hàng thành công');;
        }
        catch(Exception $err){
            session()->flash('fail','Có lỗi, vui lòng thử lại');
        }
    }
}
