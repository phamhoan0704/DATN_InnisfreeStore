<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')

<body>
    @yield('Scripts')
    {{-- Model Thông báo--}}
    {{-- {{dd(request()->segment(2))}} --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Thông báo</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                    <h5> {{session('success')}}</h5>
                    @endif
                    @if(session()->has('error'))
                    <h5> {{session('error')}}</h5>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    {{-- <button type="submit" class="btn btn-danger">Xóa</button> --}}
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="site-topbar">
            <div class="site-topbar__container">
                <div class="site-topbar__text">

                </div>
            </div>
        </div>

        <div class="admin_site-header-container">
            <div class="admin_site-header">
                <div class="admin_site-header__logo">
                    <a href="{{ route('user.homepage') }}">
                        <img src="{{ url('template/user/image/icon/logo_innisfree.png') }}" alt="" class="img-logo">
                    </a>
                </div>
            
                
            </div>
        </div>

    </div>
    <div class="main_menu">
        <ul>
            {{-- <li><a href="" style="font-weight:bold;font-size:20px;color:white">
                    Danh mục quản lí</a></li> --}}
            <li><a id="homepage" href="{{route('admin.homepage')}}">Trang Chủ</a></li>
            <li><a id="header-category" href="{{route('admin.category.index')}}">Danh mục</a></li>
            <li><a id="header-product" href="{{route('admin.product.index')}}">Sản phẩm</a></li>
            {{-- <li><a id="header-author" href="{{route('admin.author.index')}}">Tác giả</a></li> --}}
            <li><a id="header-user" href="{{route('admin.account.index')}}">Tài khoản</a></li>
            <li><a id="header-supply" href="{{route('admin.supplier.index')}}">Nhà cung cấp</a></li>
            <li><a id="header-order" href="{{route('admin.order.index',['status'=>'6'])}}">Đơn hàng</a></li>
            <li><a id="header-news" href="{{route('admin.news.index')}}">Tin tức</a></li>
            <li><a id="header-notice" href="{{route('admin.index')}}">Email</a></li>
            <li><a id="header-report" href="{{route('admin.report')}}">Doanh thu</a></li>
            <li><a id="header-report" href="{{route('admin.report')}}">Cửa hàng</a></li>

            <a style="padding-right: 0" href="" @if($data->user_type==0) title="Quản trị viên" @else  title="Nhân viên" @endif  >
                <img src="{{ url('template/user/image/icon/userAdmin.png') }}" alt="" style="width:30px;opacity:0.7">  @if(Session::has('loginId'))  {{$data->user_name}}
                @else
                @endif

                <a href="{{route('admin.logOut')}}" class="site-topbar__logout"> <img src="{{ url('template/user/image/icon/logout.png') }}" alt="" style="width:30px; opacity:0.4"></a>

            </a>

        </ul>

    </div>

    <div class="main_content">
        

        <div class="content">
            {{-- @include('backend.alert')--}}
            @yield('Content')
        </div>
    </div>

    @if(session()->has('success'))
    <script>
        $(document).ready(function() {
                $('#addModal').modal();
         });
    </script>
    @else
    @endif

    @if(request()->name == 'active')
    <script>
        document.getElementById("home-tab-item-active").style.background = "#ccc";
        document.getElementById("home-tab-item-active-link").style.color = "white";
    </script>
    @elseif(request()->name=='hide') {
    <script>
        document.getElementById("home-tab-item-hide").style.background = "#ccc";
        document.getElementById("home-tab-item-hide-link").style.color = "white";
    </script>
    @else
    <script>
        document.getElementById("home-tab-item-all").style.background = "#ccc";
        document.getElementById("home-tab-item-all-link").style.color = "white";
    </script>
    @endif

    <script>
        function setColorForMenu(menuItem) {
                document.getElementById(menuItem).style.background = "#ccc";
                document.getElementById(menuItem).style.color = "#333";
            }
    </script>

    @switch(request()->segment(2))
    @case('category')
    <script>
        setColorForMenu('header-category');
    </script>
    @break
    @case('product')
    <script>
        setColorForMenu('header-product');
    </script>
    @break
    @case('author')
    <script>
        setColorForMenu('header-author');
    </script>
    @break
    @case('supplier')
    <script>
        setColorForMenu('header-supply');
    </script>
    @break
    @case('order')
    <script>
        setColorForMenu('header-order');
    </script>
    @break

    @case('report')
    <script>
        setColorForMenu('header-report');
    </script>
    @break

    @case('homepage')
    <script>
        setColorForMenu('homepage');
    </script>
    @break
    @case('email')
    <script>
        setColorForMenu('header-notice');
    </script>
    @break
    @case('account')
    <script>
        setColorForMenu('header-user');
    </script>
    @break
    @case('news')
    <script>
        setColorForMenu('header-news');
    </script>
    @break
   
    @default

    @endswitch

    @include('admin.footer')



</body>

</html>