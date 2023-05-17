<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\AccountService;
use App\Http\Requests\admin\AccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\User\UserService;

class AccountController extends Controller
{
    protected $accountService;
    protected $userService;

    public function __construct(AccountService $accountService,UserService $userService)
    {
        $this->accountService=$accountService;
        $this->userService=$userService;
    }
    public function index($name=0,Request $request){
    
        $countActive=$this->accountService->getCount(1);
        $countHide= $this->accountService->getCount(0);
        $countAll= $this->accountService->getCount(-1);
        $count=[$countAll,$countActive,$countHide];
        $data=$this->userService->getUser();
        $filters=[];
        if(!empty($name)){
           if($name==='active'){
               $active=1;
            }else if($name=='hide'){ 
                $active=0;
            }
        $filters[]=['users.active','=',$active];
        }
        $list=$this->accountService->getAll($filters);
       
        foreach($list as $item)
        { 
             $totalById=$this->accountService->getTotal($item->id);

             $item->total=$totalById;
        }

        //Search 
        $search_txt=$request->search_txt;
        if(!empty($search_txt)){
            $resultSearch=$this->accountService->getSearch($search_txt,$filters);
        }
        else{
            return view('admin.account.account_list',compact(['data','list','count']));
        }
        return view('admin.account.account_list',compact(['data','list','resultSearch','count','search_txt']));
    }
    public function create()
    {
        $data=$this->userService->getUser();
        if($data->user_type==0)
            return view('admin.account.accountAdd',compact(['data']));
        else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập vào trang này');
        }
    }
    public function postAdd(AccountRequest $request)
    {
       
         $dataInsert=[
            'user_name'=>$request->name,
            'pass'=>$request->pass,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'type'=>$request->user_type,
            'created_at'=>date('y-m-d'),
          
        ];
      
        $tt=$this->accountService->addAccount($dataInsert);
        return redirect()->route('admin.account.index');
    }
    
    // public function postEdit(AccountRequest $request,$id){
    //     $data=[
    //         'user_name'=>$request->name,
    //         'pass'=>$request->pass,
    //         'email'=>$request->email,
    //         'phone'=>$request->phone,
    //         'type'=>$request->user_type
            
    //     ];
    //     $this->accountService->updateAccount($data,$id);
    //     return redirect()->route('admin.Account.index');
    // }
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
            $this->accountService->activeAccount($ids,$id,$active);
        }else{
            redirect()->back();
        }
        return redirect()->back();
    }
    // public function destroy(Request $request){
    //     $id=$request->delete_id;
    //     if(!empty($id)){
    //         $this->accountService->deleteAccount($id);
    //     return redirect()->back();
    //     }
    // }
}
