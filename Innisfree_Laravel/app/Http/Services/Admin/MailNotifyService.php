<?php
namespace App\Http\Services\Admin;
use Exception;
use App\Models\EmailNotify;
use Illuminate\Support\Facades\DB;
class MailNotifyService{
    protected $table='email_notifies';

    public function getAll(){    
        $data=DB::table($this->table)
        ->get();
        return $data;
    }

    public function getSearch($search_txt){
        $list=DB::table($this->table)
        ->select('*')
        ->where('title','like','%'.$search_txt.'%')
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
    
        try{
            DB::table($this->table)->insert([
                'title'=>(string)$dataInsert['title'],
                'content'=>(string)$dataInsert['content'],
                'created_at'=>$dataInsert['created_at'],
            ]);
        }catch(Exception $err){ 
            dd($err);
            session()->flash('error','Có lỗi xảy ra. Vui lòng thử lại!');
            return false;
        }  
        return true;
    }
    public function getNotifyDetail($id){
        $detail=DB::table($this->table)
        ->where('id',$id)
        ->get();
        return $detail;
    }
   
}