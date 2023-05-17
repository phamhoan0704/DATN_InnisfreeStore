
<!-- --------------------------------------------------- -->
@extends('user.layout_user')
@section('Content')
    <div class="search-container">
        {{-- <h1>Tìm kiếm</h1> --}}
        <span>Kết quả tìm kiếm '<strong>{{$searchInfo}}</strong>'</span>
        <div class="product-list">
            @foreach ($searchList as $item)
                <div class="product-block col-4">
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
                            <p class="pro-price__new">{{$item->product_price}}VND</p>
                            <p class="pro-price__old">{{$item->product_price_pre}}VND</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        @foreach ($searchList as $item)
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
    </script>
@endsection
<!-- @extends('user.footer') -->