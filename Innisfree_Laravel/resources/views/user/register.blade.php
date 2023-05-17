@extends('user.layout_user')
@section('Content')


<div class="register_container">
        <div class="register_wapper">
            <div class="register_tittler">
                <h2>Tạo tài khoản</h2>
              <p style="text-align: center"><img src="{{url('template/user/image/icon/logoInnis2.png')}}" style="" alt=""></p> 

            </div>
            <form class="register_form" action="{{ route('user.storeUser')}}" method="POST">
            @csrf
            <!-- box thông báo đăng ký thành công -->
                <div class="register_group userip">
                    <div class="register_loginf">
                        <div class="register_icon">
                            {{-- <i class="register_fa-regular fa fa-user"></i> --}}
                        </div>
                        <div id="user">
                            <p>Username</p>
                            <input type="text" value="{{old('name')}}" name="name" placeholder="Tên đăng nhập">
                        </div>
                    </div>

                    <div class="register_messerror spName ">
                        <span> @error('name'){{$message}} @enderror</span>
                    </div>
                </div>
                <div class="register_group passwordip">
                    <div class="register_loginf">
                        <div class="register_icon">
                            {{-- <i class="register_fa-solid fa fa-lock"></i> --}}
                        </div>
                        <div id="pass">
                            <p>Password</p>
                            <input type="password" id="ipnPassword" placeholder="Mật khẩu" name="password" value="">
                        </div>
                        {{-- <div id="showpass">
                            <button id="btnPassword" type="button">
                                <i class="register_fa-regular fa fa-eye" id="btnEye"></i>

                            </button>

                        </div> --}}

                    </div>

                    <div class="register_messerror ">
                        <span >@error('password'){{$message}} @enderror</span>
                    </div>

                </div>
                <!-- <div class="register_group passwordipagain">
                    <div class="register_loginf">
                        <div class="register_icon">
                            <i class="register_fa-solid fa fa-lock"></i>
                        </div>
                        <div id="pass">
                            <input type="password" id="ipnPasswordAgain" placeholder="Xác nhận mật khẩu" name="ipnPassAgain" value="">
                        </div>
                        <div id="showpass">
                            <button id="btnPasswordAgain" type="button">
                                <i class="register_fa-regular fa fa-eye" id="btnEye"></i>

                            </button>

                        </div>
                    </div>
                    <div class="register_messerror ">
                        <span> @error('password'){{$message}} @enderror</span>
                    </div>
                </div> -->
                <div class="register_group emailip">
                    <div class="register_loginf">
                        <div class="register_icon">
                            {{-- <i class="register_fa-regular fa fa-envelope"></i> --}}
                        </div>
                        <div id="user">
                            <p>Email</p>
                            <input type="text" value="{{old('email')}}" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="register_messerror spName ">
                        <span>@error ('email'){{$message}} @enderror</span>
                    </div>
                </div>
                <div class="register_group phoneip">
                    <div class="register_loginf">
                        <div class="register_icon">
                            {{-- <i class="register_fa-solid fa fa-phone"></i> --}}
                        </div>
                        <div id="user">
                            <p>Phone number</p>
                            <input type="text" value="{{old('phone')}}" name="phone" placeholder="Số điện thoại">
                        </div>
                    </div>

                    <div class="register_messerror spName ">
                        <span>@error('phone'){{$message}} @enderror</span>
                    </div>
                </div>
                <div class="register_submit_btn">
                    <button name="submit_btn">Đăng ký 
                    <img src="{{url('template/user/image/icon/right-arrow.png')}}" style="width:25px" alt="">

                    </button>
                </div>
                <div class="register_sp1">
                    <span style="float: right; font-size:16px">Đăng nhập? <a href="{{ route('user.logIn')}}"><img src="{{url('template/user/image/icon/next.png')}}" style="width:20px;margin-left:10px" alt=""></a></span>
                </div>
                <!-- <span>hoặc</span><hr>
                <div class="register_separator">
                    <span>hoặc</span>
                </div> -->
                {{-- <div class="register_orthericon">

                        <div class="register_quick_login facebook">
                            <div class="register_logo">
                                <i class="register_fab fa fa-facebook-f"></i>
                            </div>
                            <div class="register_text">Đăng nhập bằng Facebook</div>


                        </div>
                        <div class="register_quick_login google">
                            <div class="register_logo">
                                <i class="register_fab fa fa-google-plus-g"></i>
                            </div>
                            <div class="register_text">Đăng nhập bằng Google</div>
                        </div>

                    </div>
            
        </div> --}}

        </form>
    </div>
    </div>


@endsection
