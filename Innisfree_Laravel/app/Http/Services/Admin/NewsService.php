<?php
namespace App\Http\Services\Admin;
use Exception;
use App\Models\News;
use Illuminate\Support\Facades\DB;
class NewsService{
    protected $table='news';

    public function getData(){    
        $category=DB::table($this->table)
        ->get();
        return $category;
    }
    public function getNewsDetail($order_id){
        $orderDetail=DB::table($this->table)
        ->where('id',$order_id)
        ->get();
        return $orderDetail;
    }
    public function getAll($filters=[]){
        $list=DB::table($this->table)
        ->select('*');
        if(!empty($filters)){
            $list=$list->where($filters);
        }
        $list=$list->paginate(5);
        return $list;
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
    public function getSearch($search_txt){
        $list=DB::table($this->table)
        ->select('*')
        ->where('news_title','like','%'.$search_txt.'%')
        ->get();
        if(empty($list[0])){
            $titleSearch=0;
        }else{
            $titleSearch= $list->count();
        }
        $resultSearch=[
            'listSearch'=>$list,
            'titleSearch'=>$titleSearch,
        ];
    return $resultSearch; 
    }

public function add($dataInsert){
//   dd($dataInsert);
    try{
        DB::table($this->table)->insert([
            'news_title'=>(string)$dataInsert['news_title'],
            'news_description'=>(string)$dataInsert['news_description'],
            'news_content'=>(string)$dataInsert['news_content'],
            'news_image'=>(String)$dataInsert['news_image'],
            'active'=>'1',
            'created_at'=>$dataInsert['created_at'],
        ]);

        session()->flash('success','Thêm tin tức mới thành công!');
    }catch(Exception $err){ 
        dd($err);
        session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        return false;
    }  
    return true;
}
 public function updateNews($data,$id){
        try{
            DB::table($this->table)
            ->where('id','=',$id)
            ->update([
                'news_title'=>(string)$data['news_title'],
                'news_description'=>(string)$data['news_description'],
                'news_content'=>(string)$data['news_content'],
                'news_image'=>(String)$data['news_image'],
                'active'=>'1',
                'created_at'=>$data['created_at'],
            ]);
            session()->flash('success','Cập nhật tin tức thành công!');
        }catch(Exception $err){
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
    public function activeSupplier($ids,$id,$active){
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
    public function checkSupplier($author_id){
        try{
            $list=DB::table($this->table)
            ->join('products','products.category_id','suppliers.id')
            ->where('category_id',$author_id)
            ->get();
            return count($list);
        }catch(Exception $err){
        dd($err);
            // session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
    public function delete($id)
    {
        if($this->checkSupplier($id)>0){
            session()->flash('success','Nhà cung cấp này không thể xóa!');
           }
           else{
        try{
            DB::table($this->table)
            ->where('id',$id)
            ->delete();
            session()->flash('success','Xóa nhà cung cấp thành công!');
        }catch(Exception $err){
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
        }

    }
    }
}