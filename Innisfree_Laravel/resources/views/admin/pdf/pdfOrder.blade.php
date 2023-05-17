
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hóa đơn</title>
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-family:'DejaVu Sans';
}
.user_infoOrder{
  font-family:'DejaVu Sans';

}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.pdf_text{
  display: block;
  width: 100%;
}
</style>
</head>
<body>

<h3 class="user_infoOrder pdf_text" style="float: right; color:#04AA6D; text-transform:uppercase">Cửa hàng Innisfree</h3>
<h3 class="user_infoOrder pdf_text" style="text-align: center">Hóa đơn mua hàng</h3>
<h4 class="user_infoOrder pdf_text" style="text-align: center">{{$curentDate}}</h4>

<div class="user_infoOrder">
    <p>Khách hàng: {{$orderDetail[0]->name}}</p>
    <p>Email: {{$orderDetail[0]->email}}</p>
    <p>Số điện thoại: {{$orderDetail[0]->phone}}</p>
    <p>Địa chỉ: {{$orderDetail[0]->address}}</p>
    <p>Ngày đặt hàng: {{$order[0]->order_date}}</p>
    <p>Ghi chú: {{$orderDetail[0]->order_note}}</p>
</div>
<table id="customers">
  <tr>
    <th style="width:60%">Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
  </tr>
  @foreach($orderDetail as $value)
  <tr>
    <td>{{$value->product_name}}</td>
    <td>{{$value->product_amount }}</td>
    <td>{{$value->product_price }}</td>
</tr>

@endforeach
 
</table>
<p class="pdf_text user_infoOrder">Chi phí giao hàng:<b> {{$order[0]->delivery_money}}</b></p>
<p class="pdf_text user_infoOrder">Tổng thanh toán:<b> {{$order[0]->total_money}}</b></p>
<h4 class="user_infoOrder pdf_text" style="text-align: center;bottom:0">Cảm ơn quý khách đã mua hàng!</h4>

</body>
</html>


