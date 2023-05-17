@extends('user.layout_user')
@section('Content')

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
@if(session()->has('success'))
<script>
    $(document).ready(function() {
            $('#addModal').modal();
     });
</script>
@else

@endif
<div class="order_detail_container">
    <div style="width:100%;display:flex;box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
    <div class="order_detail_customer">
        <div class="letter"></div>
        <h1>Thông tin người nhận</h1>

        <table>
            <tr>
                <td class="title_min">Họ tên:</td>
                <td class="">
                    <p>
                        {{$orderDetail->name}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="title_min">Email:</td>
                <td class="">
                    <p>
                        {{$orderDetail->email}}
                        
                    </p>
                </td>
            </tr>
            <tr>
                <td class="title_min">Số điện thoại:</td>
                <td class="">
                    <p>
                        {{$orderDetail->phone}}
                       
                    </p>
                </td>
            </tr>
            <tr>
                <td class="title_min">Địa chỉ:</td>
                <td class="">
                    <p>
                        {{$orderDetail->address}}
                    </p>
                </td>
            </tr>
            <tr>
                <td class="title_min">Ghi chú:</td>
                <td class="">
                    <p>
                        {{$orderDetail->order_note}}
                        
                    </p>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="order_status" style="">
        <div class="letter"></div>
        <h1>Chi tiết đơn hàng </h1>
        <table>
            <tr>
                {{-- <td class=""><img src="{{ url('template/user/image/icon/shopping-bag.png') }}" alt=""></td> --}}
                <td>Ngày đặt hàng:</td>
                <td>
                    {{$orderDetail->order_date}}
                </td>
            </tr>
            <tr>
                {{-- <td class=""><img src="{{ url('template/user/image/icon/money.png') }}" alt=""></td> --}}
                <td>Thanh toán:</td>
                <td>
                    
                    @if($orderDetail->payment_method==0)
                    Thanh toán qua tài khoản
                    @endif
                     
                     @if($orderDetail->payment_method==1)
                    Thanh toán khi nhận hàng
                    @endif
                     
                </td>
            </tr>
            <tr>
                {{-- <td><img src="{{ url('template/user/image/icon/accept.png') }}" alt=""></td> --}}
                <td>Tình trạng thanh toán:</td>
                <td>
                    
                    @if($orderDetail->payment_status==0)
                    Chưa thanh toán
                    @endif
                    @if($orderDetail->payment_status==1)
                    Đã thanh toán
                    @endif
                </td>
            </tr>
            <tr>
                <!-- <td class=""><img src="../img/icon/shopping-bag.png" alt=""></td> -->
                {{-- <td> @if($orderDetail->order_status==0)
                    <img src="{{ url('template/user/image/icon/order.png') }}" alt="">
                    @endif

                    @if($orderDetail->order_status==1)
                    <img src="{{ url('template/user/image/icon/pack.png') }}" alt="">
                    @endif

                    @if($orderDetail->order_status==2)
                    <img src="{{ url('template/user/image/icon/delivery.png') }}" alt="">
                    @endif

                    @if($orderDetail->order_status==3)
                    <img src="{{ url('template/user/image/icon/delivery_success.png') }}" alt="">
                    @endif
                </td> --}}
                <td>Tình trạng đơn hàng:</td>
                <td>
                    @if($orderDetail->order_status==0)
                    Đặt hàng thành công
                    @endif
                    @if($orderDetail->order_status==1)
                    Đang chuẩn bị hàng
                    @endif
                    @if($orderDetail->order_status==2)
                    Đơn hàng đang được vận chuyển
                    @endif
                    @if($orderDetail->order_status==3)
                    Giao hàng thành công
                    @endif
                </td>
            </tr>
        </table>

    </div>
    </div>
    <div class="order_pdt" style="margin-top: 50px; margin-bottom:0px">
        <div class="order_list_pdt">
            <table>
                @foreach($orderProductDetail as $item)
                <tr>
                    <td class="td_img"><a href="" class="order_pdt_img"><img
                                src="{{ url('template/image/product_image/'.$item->product_image) }}" alt=""></a></td>
                    <td><a href="">{{$item->product_name }} </a> <br>{{$item->product_amount }} </td>
                    <td></td>
                    <td>
                        <p>{{ number_format($item->product_price)}}VND</p>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="width:75%; border-bottom:none"><span style="float: right"> Phí vận chuyển</span></td>
                    <td style="border-bottom:none">
                        <p>{{ number_format($orderDetail->delivery_money)}} VND</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"style="width:75%; border-bottom:none" ><span style="float: right"> Thành tiền</span></td>

                    <td style="border-bottom:none">
                        <p style="font-weight:700;font-size: 18px;color:#12b560">{{ number_format($orderDetail->total_money)}}VND </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @if ($orderDetail->order_status==0||$orderDetail->order_status==1)
    <form method="POST" class="order_status_update" action="{{route('user.order.post-edit',['id'=>$orderDetail->id])}}">
        @csrf
        <input type="text"  name="status" value="4" hidden>
        <button type="submit" class="btn btn-danger" style="width: 100px;height: 30px;background-color: #f03d3d;margin:30px 30px">Hủy đơn</button>
    </form>
    @else
        
    @endif

</div>
@endsection