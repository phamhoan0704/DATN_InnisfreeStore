@extends('user.layout_user')
@section('Content')
<div class="login_container">
    <div class="login_wapper">
        <div class="login_tittle">
            <h2>Đăng nhập
               </h2>
              <p style="text-align: center"><img src="{{url('template/user/image/icon/logoInnis2.png')}}" style="" alt=""></p> 
              {{-- <p style="text-align: center"><img src="{{url('template/user/image/icon/tea.png')}}" style="width:100px" alt=""></p>  --}}

        </div>
        <form method="post" action="{{route('user.check-login')}}">
            @csrf
            <div class="login_group userip">
                <div class="login_loginf">
                    <div class="login_icon">
                        {{-- <i class="login_fa-regular fa fa-user"></i> --}}
                    </div>
                    <div id="login_user">
                      <p>Username</p>  
                        <input type="text" value="{{old('name')}}" name="name" placeholder="Tên đăng nhập" autofocus>
                    </div>
                </div>
                <div class="login_messerror"> <span>@error('name'){{$message}} @enderror
                    @if(Session::has('fail1'))
                    {{Session::get('fail1')}}
                    @endif
                </span>
            </div>
            </div>
            <div class="login_group passwordip">
                <div class="login_loginf">
                    <div class="login_icon">
                        {{-- <i class="login_fa-solid fa fa-lock"></i> --}}
                    </div>
                    <div id="login_pass">
                      <p>Password</p>  
                        <input type="password" id="login_ipnPassword" placeholder="Mật khẩu" name="password">
                    </div>
                    {{-- <div id="login_showpass">
                        <button id="login_btnPassword" type="button">
                            <i class="login_fa-regular fa fa-eye" id="login_btnEye"></i>

                        </button>

                    </div> --}}
                </div>
                <div class="login_messerror">
                    <span>
                       
                        @error('password'){{$message}} @enderror
                        @if(Session::has('fail2'))
                        {{Session::get('fail2')}}
                        @endif
                        @if(Session::has('fail3'))
                        {{Session::get('fail3')}}
                        @endif
                        </span>
                </div>
            </div>
            <div class="login_submit_btn">
                <button name="submit_btn">Đăng nhập
                    <img src="{{url('template/user/image/icon/right-arrow.png')}}" style="width:25px" alt="">
                </button>
            </div>
            <div class="login_sp1">
                <div>
                    <span style="float: right"><a>Bạn quên mật khẩu?<img src="{{url('template/user/image/icon/next.png')}}" style="width:20px;margin-left:10px" alt=""></a></span>

                </div>
                <div>
                    <span>Đăng ký thành viên mới? <a href="{{route('user.register')}}"><img src="{{url('template/user/image/icon/next.png')}}" style="width:20px;margin-left:10px" alt=""></a></span>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection