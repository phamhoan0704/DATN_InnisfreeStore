@extends('user.layout_user')
@section('Content')
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
                <button type="button" class="btn btn-success" data-dismiss="modal" style="width:100px">OK</button>
                {{-- <button type="submit" class="btn btn-danger">Xóa</button> --}}
            </div>
            </form>
        </div>
    </div>
</div>
@if(session()->has('error'))
<script>
    $(document).ready(function() {
            $('#addModal').modal();
     });
</script>
@else

@endif
<div class="cart_container">

    <div class="cart_detail">
        <div class="cart_title">
            <div class="cart_title_item cart_img">
            </div>
            <div class="cart_title_item cart_name">
                <p>Sản phẩm</p>
            </div>
            <div class="cart_title_item cart_price">
                <p>Đơn giá</p>
            </div>
            <div class="cart_title_item cart_qty">
                <p>Số lượng</p>
            </div>
            <div class="cart_title_item cart_remove">
                <p>Thao tác</p>
            </div>
        </div>
        <div class="cart_list">
            <form action="" method="post" >
            
                @csrf
                @foreach($cartList as $item)
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="{{route('user.product-detail',['id'=>$item->id])}}"><img src="{{ url('template/image/product_image/'.$item->product_image) }}" alt=""></a>
                    </div>
                    <div class="cart_name">
                        <a href="{{route('user.product-detail',['id'=>$item->id])}}">{{$item->product_name}}</a>
                    </div>
                    <div class="cart_price">
                        <p>{{number_format($item->product_price)}}</p>
                    </div>
                    <div class="cart_qty">
                        <!-- <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php?> -->
                        <p><input type="number" name="amount[{{$item->id}}]" value="{{$item->product_amount}}" min=1> </p>
                    </div>


                    <div class="cart_remove">
                        <a href="{{route('user.cart.delete',['id'=>$item->product_id])}}"> 
                            <img src="{{ url('template/user/image/icon/delete.png') }}" alt="" style="width:32px">

                        </a>
                    </div>
                </div>
                @endforeach
                
                <!-- <div class="cart_item">
                <div class="cart_img">
                    <a href=""><img src="../Image/product_image/pdt2.png" alt=""></a>
                </div>
                <div class="cart_name">
                    <a href="">Re: Zero - Bắt Đầu Lại Ở Thế Giới Khác - 12</a>
                </div>
                <div class="cart_qty">
                    <p><input type="number" value="1" min=1></p>   
                </div>
                <div class="cart_price">
                    <p>VND 102.000</p>
                </div>
                <div class="cart_remove">
                    <a href="">Xóa</a>
                </div>
            </div> -->
        </div>
        {{-- <div class="cart_total">
            <div class="cart_img"></div>
            <div class="cart_name"></div>
            <div class="cart_qty" style="padding-top: 50px">
                <p>Thành tiền</p>
            </div>
            <div class="cart_price" style="padding-top: 50px">
                <p>{{number_format(\App\Helpers\User\CartHelper::totalMoney($cartList))}} đ</p>
            </div>
        </div> --}}
        <div class="cart_btn">

            {{-- <div class="cart_return">
                <a href="{{route('user.homepage')}}">
                    <i class="fa fa-solid fa-reply"></i>
                    <p>Tiếp tục mua hàng</p>
                </a>
            </div> --}}
            <button type="submit" style="background: white;width:32px" onclick="" name="action" value=""  formaction="{{route('user.cart.update')}}">
                <img src="{{ url('template/user/image/icon/refresh.png') }}" alt="" style="width:32px">
                <i class="fa fa-solid fa-angles-right"></i>
            </button>
        </form>            
        <form action="" method="get">
            <button formaction="{{route('user.order.index')}}">
                Mua hàng<i class="fa fa-solid fa-angles-right"></i>
            </button>
        </form>
        <div class="sum_money" >
            <p>{{number_format(\App\Helpers\User\CartHelper::totalMoney($cartList))}} VND</p>
            <p style="">Tổng thanh toán</p>
        </div>
    
        </div>
        
    </div>
</div>
@endsection