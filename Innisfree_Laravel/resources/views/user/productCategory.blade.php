
<!-- --------------------------------------------------- -->
@extends('user.layout_user')
@section('Content')
    <div id="product-category-container">
        {{-- <div class="breadcrumb">
            <ol class="breadcrumb-arrow">
                <li><a href="home.php" target="_self">Trang chủ</a></li>
                <li><a href="{{route('category',['id'=>'0'])}}" target="_self">Danh mục</a></li>
                <li>
                    <span>
                    @foreach ($categoryList as $item) 
                        @if(request()->segment(2) == $item->id) 
                            {{$item->category_name}}
                        @endif
                    @endforeach
                    </span>
                </li>
            </ol>
        </div> --}}
        <div class="product-category-content">
            <div class="left_nav_menu">

     
            <div class="nav-menu">
                        <h4 style="padding: 20px">Danh mục sản phẩm</h4>
                        <ul class="sub-menu nav-menu-list">
                          <li>@foreach ($categoryList as $item)
                            <li class="nav-item">
                                <a href="{{route('category',['id'=>$item->id])}}" 
                                @if(request()->segment(2) == $item->id) 
                                    style="color:#01a14b;"
                                @endif
                                >{{$item->category_name}}</a>
                            </li>
                        @endforeach</li>
                        
                        </ul>
           
            </div>

            <div class="browse-tags">
                {{-- <h4 class="custom-dropdown_title" style="padding: 0">Sắp xếp danh sách</h4> --}}
                <span class="custom-dropdown">
                    <select id="selectBox" class="custom-dropdown__select" name="custom-dropdown__select" onchange="dropdownOption(value,{{$category_id}})">
                        {{-- <option value="manual">Sản phẩm nổi bật</option> --}}
                        <option value="price-asc"
                            @if(str_contains(url()->full(),'price-asc')) 
                                {{'selected'}} 
                            @endif
                            >Giá sản phẩm tăng dần</option>
                        <option value="price-desc"
                            @if(str_contains(url()->full(),'price-desc'))
                                {{'selected'}} 
                            @endif
                            >Giá sản phẩm giảm dần</option>
                        <option value="title-asc"
                            @if(str_contains(url()->full(),'title-asc')) 
                                {{'selected'}} 
                            @endif
                            >Tên sản phẩm tăng dần</option>
                        <option value="title-desc"
                            @if(str_contains(url()->full(),'title-desc'))
                                {{'selected'}} 
                            @endif
                            >Tên sản phẩm giảm dần</option>
                    </select>
                </span>
            </div> 
        </div>
            <div class="product-category-main-content">
                <div class="main-content-heading">
                    {{-- <h1 style="border:none;">
                    @foreach ($categoryList as $item) 
                        @if(request()->segment(2) == $item->id) 
                            {{$item->category_name}}
                        @endif
                    @endforeach
                    </h1> --}}

                </div>
                
                <div class="product-list">
                    @if(count($productList) == 0) 
                    <div style="margin: 48px auto; font-size: 18px;">Không có sản phẩm</div>
                    @endif
                    @foreach ($productList as $item)
                    <div class="product-block col-3">
                        <div class="product__img-block">
                            <div class="product__sale">
                                <span class="sale-lable">{{  number_format((($item->product_price_pre - $item->product_price) / $item->product_price_pre)*100, 0) }}%</span>

                            </div>
                            <div class="product__sold-out-label"
                            @if($item->product_quantity > 0) 
                                style="display: none;"
                            @endif
                                >HẾT HÀNG</div>
                            <div class="img">
                                <a href="{{route('user.product-detail',['id'=>$item->id])}}" class="product__img-link">
                                    <img src="{{ url('template/image/product_image/'.$item->product_image) }}" alt="" class="product__img">
                                </a>
                                <div class="pdt_icon">
                                    <a class="btn-buynow" title="Thêm vào danh sách yêu thích" href="{{route('user.favorite.add',['id'=>$item->id])}}" id="{{$item->id}}" >
                                        <div class="icon_list">
                                    <img src="{{ url('template/user/image/icon/heart.png') }}" alt="">
                                        </div>
                                    </a>
                                    <a class="btn-add-to-cart" id="{{$item->id}}" onclick="checkSoldOut('{{$item->product_quantity}}')" title="Thêm vào giỏ" href="{{route('user.cart.add',['id'=>$item->id])}}">
                                        <div class="icon_list">
                                    <img src="{{ url('template/user/image/icon/shopping-cart.png') }}" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product__detail">
                            <a href="" class="product__name" title="">{{$item->product_name}}</a>
                            <div class="product__price">
                                <p class="pro-price__new">{{number_format($item->product_price)}}VND</p>
                                <p class="pro-price__old">{{number_format($item->product_price_pre)}}VND</p>
                            </div>
                        </div>

                                               </div>
                    @endforeach
                </div>
                {{$productList->links()}}
            </div>
        </div>
    </div>
    
    <script>
        @foreach ($productList as $item)
            @if($item->product_quantity == 0) 
                document.getElementById({{$item->id}}).removeAttribute("href");
            @endif
        @endforeach

        function checkSoldOut(id) {
            if(id == '0') 
            {
                document.getElementById('notice').style.display = 'block';
                document.getElementById("showSoldOutNotice").innerHTML = "Sản Phẩm Đã Hết Hàng";

            }

        }
        
        function closePopup()
        {
            console.log('close');
            document.getElementById("notice").style.display = "none"; 
        }   

        function dropdownOption(value, id)
        {
            if(id == undefined) var url = "http://127.0.0.1:8000/category?sort_by=" + value;
            else var url = "http://127.0.0.1:8000/category/" + id + "?sort_by=" + value;
            window.location.href = url;
        }

        $('.nav-menu > .sub-menu').parent().click(function() {
  var submenu = $(this).children('.sub-menu');
  if ( $(submenu).is(':hidden') ) {
    $(submenu).slideDown(200);
  } else {
    $(submenu).slideUp(200);
  }
});


    </script>
    
@endsection
<!-- @extends('user.footer') -->