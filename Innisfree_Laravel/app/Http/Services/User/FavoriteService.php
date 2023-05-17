<?php
namespace App\Http\Services\User;
use Exception;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use app\Models\Favorite;
class FavoriteService{
    protected $table='favorite_product';

    public function getAuthor(){    
        $author=DB::table($this->table)
        ->get();
        return $author;
    }
    
   public function getFavoriteList(){
        if(Session::has('loginId')){
            $user_id=session()->get('loginId');
            $id=DB::table('favorites')->select('id')->where('user_id',$user_id)->first();
            $id=$id->id;
            $cartList=DB::table($this->table)
            ->join('products', 'favorite_product.product_id', '=', 'products.id')
            ->where('favorite_id',$id)
            ->get();
        
    }
    else
    {
        $cartList=array();
     }
  
    return $cartList;
  
    }
    public function add($dataInsert){
        $user_id=session()->get('loginId');
        $id=DB::table('favorites')->select('id')->where('user_id',$user_id)->first();
        $id=$id->id;
        $productItem=DB::table($this->table)
        ->where('favorite_id',$id)
        ->where('product_id',$dataInsert->id)
        ->first();
        if(empty($productItem)){
            DB::table($this->table)->insert([
                'favorite_id'=>$id,
                'product_id'=>$dataInsert->id,
            ]);
        }
    }
    public function delete($id)
    {
        $user_id=session()->get('loginId');
        $cart_id=DB::table('carts')->select('cart_id')->where('user_id',$user_id)->first();
        $cart_id=$cart_id->cart_id;
        try{
           $cartItem= DB::table($this->table)
            ->where('cart_id',$cart_id)
            ->where('product_id',$id)
            ->delete();
         
        }catch(Exception $err){
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }

    }
    public function deleteCart()
    {
        $user_id=session()->get('loginId');
        $id=DB::table('carts')->select('cart_id')->where('user_id',$user_id)->first();
        $id=$id->cart_id;
        try{
           $cartItem= DB::table($this->table)
            ->where('cart_id',$id)
            ->delete();
        }catch(Exception $err){
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }

}