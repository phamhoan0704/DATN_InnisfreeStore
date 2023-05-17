<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NotifyMail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail ;
use App\Http\Controllers\user\NotifyMai;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use App\Http\Services\Admin\MailNotifyService;
use App\Http\Services\User\UserService;


class SendEmailController extends Controller{
    protected $maiNotifyService;
    public function __construct(MailNotifyService $maiNotifyService,UserService $userService)
    {
        $this->maiNotifyService=$maiNotifyService;
        $this->userService=$userService;

    }

    public function index(Request $request)
    {
       
        $list=$this->maiNotifyService->getAll();
        $data=$this->userService->getUser();
    
        //Search 
        $search_txt=$request->search_txt;
        if(!empty($search_txt)){
            $resultSearch=$this->maiNotifyService->getSearch($search_txt);
        }
        else{
            return view('admin.mailNotify.notify_list',compact(['data','list']));
        }
        return view('admin.mailNotify.notify_list',compact(['data','list','resultSearch','search_txt']));
    }


    public function create(Request $request)
    {
        $data=$this->userService->getUser();
       return view('admin.notification',compact(['data']));
    }
    
    public function sendMail(Request $request)
    {
     $content=$request->content;
     $title=$request->title;

        $emailList=DB::table('users')
        ->select('email','user_name')
        ->where('active',1)->get();
       
        foreach($emailList as $item)
        {
            $emailAddress=$item->email;
            $name=$item->user_name;
           
            Mail::send('user.emailView',compact('title','content','name'),function($email ) use($emailAddress, $title){
               $email->subject($title);
               $email->to($emailAddress,"you");
            });
        }    

        $dataInsert=[
            'title'=>$request->title,
            'content'=>$request->content,
            'created_at'=>date('y-m-d'),
        ];
        $this->maiNotifyService->add($dataInsert);


        return back()->with('success', 'Gửi email thông báo thành công!');
    }

    public function getNotifyDetail($request){
        $data=$this->userService->getUser();

        $detail=$this->maiNotifyService->getNotifyDetail($request)[0];
        return view('admin.mailNotify.notify_detail',compact(['data','detail']));
    }
}
