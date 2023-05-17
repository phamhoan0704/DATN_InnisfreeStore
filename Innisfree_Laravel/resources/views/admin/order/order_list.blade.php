@extends('admin.layout_admin')
@section('Content')
<div class="management_main">
    <form method="get" action="">
        @csrf
        <div class="home-tabs">
            <div class="home-tab-title">


                <div class="home-tab-item" @if($status=='6' ) style="background: #ccc" @endif style="padding:0px 12px " id="home-tab-item">
                    <a style="font-size:14px" @if($status=='6' ) style="color:white" @endif id="home-tab-item-all-link" href="{{route('admin.order.index',['status'=>'6'])}}">Tất cả</a>
                    <span>{{$count[0]}}</span>
                </div>


                <div class="home-tab-item" @if($status=='0' ) style="background: #ccc" @endif style="padding:0px 12px" id="home-tab-item-active">
                    <a style="font-size:14px" @if($status=='0' ) style="color:white" @endif id="home-tab-item-active-link" href="{{route('admin.order.index',['status'=>'0'])}}">Đặt hàng</a>
                    <span>{{$count[1]}}</span>
                </div>


                <div class="home-tab-item" @if($status=='1' ) style="background: #ccc" @endif style="padding:0px 12px" id="home-tab-item-hide">
                    <a style="font-size:14px" @if($status=='1' ) style="color:white" @endif id="home-tab-item-hide-link" href="{{route('admin.order.index',['status'=>'1'])}} ">Đang chuẩn bị</a>
                    <span>{{$count[2]}}</span>
                </div>


                <div class="home-tab-item" @if($status=='2' ) style="background: #ccc" @endif style="padding:0px 12px" id="home-tab-item-hide">
                    <a style="font-size:14px" @if($status=='2' ) style="color:white" @endif id="home-tab-item-hide-link" href="{{route('admin.order.index',['status'=>'2'])}} ">Vận chuyển</a>
                    <span>{{$count[3]}}</span>
                </div>


                <div class="home-tab-item" @if($status=='3' ) style="background: #ccc" @endif style="padding:0px 12px" id="home-tab-item-hide">
                    <a style="font-size:14px" @if($status=='3' ) style="color:white" @endif id="home-tab-item-hide-link" href="{{route('admin.order.index',['status'=>'3'])}} ">Đã giao</a>
                    <span>{{$count[4]}}</span>
                </div>


                <div class="home-tab-item" @if($status=='4' ) style="background: #ccc" @endif style="padding:0px 12px" id="home-tab-item-hide">
                    <a style="font-size:14px" @if($status=='4' ) style="color:white" @endif id="home-tab-item-hide-link" href="{{route('admin.order.index',['status'=>'4'])}} ">Đã hủy</a>
                    <span>{{$count[5]}}</span>
                </div>
                <button onclick="myFunction()" type="button" style="border: none;background-color:white; margin-left:20px"><img style="width:20px" src="{{ url('template/user/image/icon/down-chevron.png') }}" alt=""></button>

            </div>
            <div id="func">
            <div class="layout-list-row layout-list-btn-wrap">
                <form method="post" action="">
                    @csrf
                    {{-- <label for="" class="label_search">Tìm kiếm</label> --}}
                    <div>
                    <input placeholder="Nhập mã đơn hàng" class="ipn_search" type="search" name="search_txt" value="{{request()->search_txt}}">
                    <button type="submit" class="btn btn-success" value="" name="" style="display: none">Tìm kiếm</button>
                    <input type="hidden" value=""></div>
                    {{-- <div> 
                        <span>Sắp xếp theo:</span>
                        <select name="sort">
                        <option value="1" @if('1==1') {{"selected=\"selected\""}} @endif>Tiền hàng lớn nhất</option>
                        <option value="2" @if('1==1') {{"selected=\"selected\""}} @endif>Tiền hàng nhỏ nhất</option>
                        <option value="3" @if('1==1') {{"selected=\"selected\""}} @endif>Ngày mua gần nhất</option>
                    </select></div> --}}
                </form>
                @if (isset($resultSearch['titleSearch']))
                    
                <p>Tìm được <span style="color: red; font-size: 16px;">{{$resultSearch['titleSearch']}}</span> kết quả có chứa '{{$search_txt}}' 
                </p>
                 
                @endif

            </div>
            @if (isset($resultSearch['titleSearch']))
            <div class="layout-list-row">
                <table class="layout_table">
                    {{-- @if (isset($resultSearch['titleSearch']))
                    <tr>
                        <td colspan="7"> Kết quả tìm kiếm :<span style="color: red; font-size: 16px;padding-left:10px">{{$resultSearch['titleSearch']}}</span>
                        </td>
                    </tr> --}}
                    {{-- Tiêu đề kết quả --}}
                    @if (isset($resultSearch['titleSearch'])&&$resultSearch['titleSearch']>0) 
                    <tr class="title_order">
                        <td  class="id_title">Mã</td>
                        <td  class="id_title">Mã KH</td>
                        <td  class="createdDate_title">Tên KH</td>
                        <td  class="name_title">Địa chỉ</td>
                        <td class="createdDate_title">Tổng tiền</td>
                        <td class="name_title">Trạng thái đơn hàng</td>
                        <td class="createdDate_title">Ngày đặt hàng</td>
                        <td class="action_title1">Thao tác</td>
                        {{-- <td>Xóa</td> --}}
                    </tr>
                    @endif
                    @endif
                    {{-- Danh sách kết quả tìm kiếm --}}
                    @foreach ($resultSearch['listSearch']??[] as $item)
                    <tr>
                        
                    <td>{{$item->id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->total_money}}</td>
                                <td>
                                    @if($item->order_status==0)
                                    {{'Đặt hàng'}}
                                    @endif
                                    @if($item->order_status==1)
                                    {{'Đang chuẩn bị hàng'}}
                                    @endif
                                    @if($item->order_status==2)
                                    {{'Đang vận chuyển'}}
                                    @endif
                                    @if($item->order_status==3)
                                    {{'Giao hàng thành công'}}
                                    @endif
                                    @if($item->order_status==4)
                                    {{'Đã hủy'}}
                                    @endif

                                </td>
                                <td>{{$item->order_date}}</td>
                                <td class="action_title" style="margin-top:13px">
                                    <a class="btn btn-primary" href="{{route('admin.order.detail',['id'=>$item->id])}}">Xem chi tiết</a>
                               

                                @if(($item->order_status==0&& $item->order_status!=null)||($item->order_status==1&& $item->order_status!=null))
                               
                                
                               <form method="post" action="{{route('admin.order.destroy',['id'=>$item->id])}}">
                                @csrf
                                    {{-- <button type="submit" class="btn btn-danger deleteCategoryBtn " value="{{$item->id}}">Xóa</button> --}}
                                </form>
                                </td>
                                @endif
                       
                    </tr>
                    @endforeach
                </table>
            </div>
            </div>
            <div class="home-tab-content">
                <div class="home-tab-pane active">
                    <!-- Danh sách index -->
                    <div class="layout-list-row">
                        <table class="layout_table">
                            {{-- Tiêu đề --}}
                            <tr class="title_order">
                                <td  class="id_title">Mã</td>
                                <td  class="id_title">Mã KH</td>
                                <td  class="createdDate_title">Tên KH</td>
                                <td  class="name_title">Địa chỉ</td>
                                <td class="createdDate_title">Tổng tiền</td>
                                <td class="name_title">Trạng thái đơn hàng</td>
                                <td class="createdDate_title">Ngày đặt hàng</td>
                                <td class="action_title1">Thao tác</td>
                                {{-- <td>Xóa</td> --}}
                            

                                @if(($status==0&& $status!=null)||($status==1&& $status!=null))
                                {{-- <td>Xóa</td> --}}
                                @endif

                            </tr>
                            {{-- Danh sách --}}
                            @foreach ($orderList as $item)
                            <tr>

                                <td>{{$item->id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->total_money}}</td>
                                <td>
                                    @if($item->order_status==0)
                                    {{'Đặt hàng'}}
                                    @endif
                                    @if($item->order_status==1)
                                    {{'Đang chuẩn bị hàng'}}
                                    @endif
                                    @if($item->order_status==2)
                                    {{'Đang vận chuyển'}}
                                    @endif
                                    @if($item->order_status==3)
                                    {{'Giao hàng thành công'}}
                                    @endif
                                    @if($item->order_status==4)
                                    {{'Đã hủy'}}
                                    @endif

                                </td>
                                <td>{{$item->order_date}}</td>
                                <td class="action_title" style="margin-top:13px">
                                    <a class="btn btn-primary" href="{{route('admin.order.detail',['id'=>$item->id])}}">Xem chi tiết</a>
                                

                                @if(($status==0&& $status!=null)||($status==1&& $status!=null))
                                
                               <form method="post" action="{{route('admin.order.destroy',['id'=>$item->id])}}" style="display: inline-block">
                                @csrf
                                    {{-- <button type="submit" class="btn btn-danger deleteCategoryBtn " value="{{$item->id}}">Xóa</button> --}}
                                </form>
                                @endif
                                </td>
                                
                            </tr>
                            @endforeach
                        </table>
                        {{$orderList->links()}}
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
{{-- Số trang --}}
<div>

</div>

@endsection
<script>
    function myFunction() {
  var x = document.getElementById("func");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
@section('Scripts')
{{--<script>
    $(document).ready(function() {
          $('.deleteCategoryBtn').click(function(){   
                var category_id=this.value;
                $('#category_id').val(category_id);
                $('#deleteModal').modal();
            });
         });
</script>
<script>
    $(document).ready(function() {
          $('.btn_hidden').click(function(){   
            console.log("aaaa");
            
            var val = [];
            $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
            });
            console.log(val);
            $('[name="ids[]"]').val(val);
            $('.btn_hidden').val(val);
            console.log(val);
            
            });
         });
</script> --}}

@endsection