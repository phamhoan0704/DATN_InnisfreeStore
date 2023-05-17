@extends('user.layout_user')
@section('Content')

<form method="POST">
    @csrf

    <div class="order_container">
        <div class="order_item ">
            <div class="order_pdt">
                <h1>Sản phẩm</h1>
                <div class="order_list_pdt">
                    <table>
                        @foreach ($cartList as $item)
                        <tr>
                            <td><a href="" class="order_pdt_img"><img
                                        src="{{ url('template/image/product_image/'.$item->product_image) }}" alt=""></a></td>
                            <td><a href="">{{$item->product_name}}</a> <br> {{$item->product_amount}}</td>
                            {{-- <td>{{$item->product_amount}}</td> --}}
                            <td style="width:50px">{{ number_format($item->product_price*$item->product_amount)}} VND</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="order_total">
                {{-- <h1>Tổng tiền thanh toán</h1> --}}
                <table>
                    <tr>
                        <td style="width:85%" class="order_total_title"><span style="float: right">Tổng tiền sản phẩm</span> </td>
                        <input type="hidden" name=""
                            value="{{number_format(\App\Helpers\User\CartHelper::totalMoney($cartList)) }}">
                        <td class="order_money">{{number_format(\App\Helpers\User\CartHelper::totalMoney($cartList)) }}
                            VND</td>
                    </tr>
                    <tr>
                        <td style="width:75%" class="order_total_title"><span style="float: right">Phí vận chuyển</span></td>
                        <input type="hidden" name="delivery_money"
                            value="{{\App\Helpers\User\OrderHelper::delivery_fee(\App\Helpers\User\CartHelper::totalMoney($cartList))}} ">
                        <td class="order_money">{{
                            number_format(\App\Helpers\User\OrderHelper::delivery_fee(\App\Helpers\User\CartHelper::totalMoney($cartList)))}}
                            VND</td>
                    </tr>
                    <tr>
                        <td  style="width:75%" class="order_total_title" style="font-weight: 600;"><span style="float: right">Thanh toán</span></td>
                        <input type="hidden" name="total_money"
                        value="{{App\Helpers\User\CartHelper::totalMoney($cartList) +
                            \App\Helpers\User\OrderHelper::delivery_fee(\App\Helpers\User\CartHelper::totalMoney($cartList))}}">
                        <td class="order_money" style="font-weight:700;font-size: 16px;">
                            {{number_format(\App\Helpers\User\CartHelper::totalMoney($cartList) +
                            \App\Helpers\User\OrderHelper::delivery_fee(\App\Helpers\User\CartHelper::totalMoney($cartList)))}}
                            VND </td>
                    </tr>
                </table>
            </div>


        </div>
        <div class="order_item order_item1">
            <div class="letter"></div>
            <div class="order_inf">
                
                {{-- <h1>Thông tin giao hàng</h1> --}}

                <div class="order_name">
                    <input type="text" placeholder="Họ và tên" name="name" value="{{$data->name}}">
                    @error('name')
                    <div>
                        <span style="color: red">{{$message}}</span>
                    </div>
                    @enderror
                </div>
                <div class="order_email">
                    <input type="text" placeholder="Email" name="email" value="{{$data->email}}">
                    @error('email')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <div class="order_phone">
                    <input type="text" placeholder="Số điện thoại" name="phone" value="{{$data->user_phone}}">
                    @error('phone')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="order_address">
                    <input type="text" placeholder="Địa chỉ" name="address" value="{{$data->delivery_address}}">

                </div>
                @error('address')
                <div>
                    <span style="color: red">{{$message}}</span>
                </div>
                @enderror
                <div class="order_note">
                    <textarea rows="3" cols="" name='note'placeholder="Ghi chú"></textarea>
                </div>
                <!-- <div class="frm_province order_frm">
              <label for="" class="label_add_detail">Tỉnh / Thành</label>
                <select class="order_add_detail" name="a"> 
                <option value=null>Chọn Tỉnh/Thành</option>
                <option value="volvo">Hà Nội</option>
                <option value="saab">Hồ Chí Minh</option>
                <option value="opel">Hải Phòng</option>
                </select>                    
            </div>
       
             <div class="frm_district order_frm">
                <label for="" class="label_add_detail">Quận / Huyện</label>
                <select class="order_add_detail" name="b"> 
                <option value=null>Chọn Quận/Huyện</option>
                <option value="volvo">Hà Dông</option>
                <option value="saab">Bắc Từ Liêm</option>
                <option value="opel">Nam Từ Liêm</option>
                </select>                     
             </div>
            -->
            </div>

            <div class="order_inf">
                <h1>Phương thức thanh toán</h1>

                <div class="order_payment">
                    <div class="payment" class="order_payment">

                        <label for="payment_bank" onclick="show()">
                        <input type="radio" id="payment_bank" name="payment" value="0">

                            {{-- <img src="{{ url('template/user/image/icon/money-transfer.png') }}" alt=""> --}}
                            <span>Thanh toán qua ngân hàng </span>
                        </label>
                    </div>

                    {{-- <div id="payment_bank_content" style="display: none;">
                        <p>Khi lựa chọn phương thức thanh toán Chuyển khoản qua ngân hàng,
                            bạn vui lòng chuyển 100% giá trị đơn hàng vào tài khoản dưới đây:
                            Chủ tài khoản: Nhà sách Trí Tuệ
                            STK: 19037014304012.<br><br>
                            Ngân hàng Thương mại Cổ phần kỹ thương Việt Nam (TECHCOMBANK)
                            Khi chuyển khoản, vui lòng đề rõ Tên – Mã Đơn hàng –
                            SĐT vào phần Nội dung chuyển khoản.</p>
                    </div> --}}

                    <div class="payment">
                        <label for="payment_receive" onclick="hidden_show()">
                        <input type="radio" id="payment_receive" name="payment" value="1" checked>

                            {{-- <img src="{{ url('template/user/image/icon/cash_delivery.png') }}" alt=""> --}}
                            <span>Thanh toán khi nhận hàng</span>
                        </label>
                    </div>
                    <p id="show"></p>

                </div>
            </div>
            {{-- <div class="order_inf order_purchase">
                <div class=" order_note">
                <h1>Ghi chú</h1>
                <textarea rows="5" cols="" name='note'></textarea>
            </div> --}}
            <div class="order_inf order_purchase">
                <button type="submit" name='btn_order' class="order_btn" formaction="{{route('user.order.add')}}">Đặt
                    hàng</button>
            </div>


        </div>
        
    </div>

    <script>
        function show() {
            var x = document.getElementById("payment_bank_content");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
        }

        function hidden_show() {
            var x = document.getElementById("payment_bank_content");
            if (x.style.display == "block") {
                x.style.display = "none";
            }
        }
    </script>
</form>
@endsection