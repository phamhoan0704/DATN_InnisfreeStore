@extends('user.layout_user')
@section('Content')
{{-- Model --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <form action="{{route('admin.author.delete')}}" method="POST">
               @csrf
               <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLabel">Thông báo</h4>
                   <button type="button" class="close" data-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                   <input type="hidden" name="delete_id" id="supplier_id">
                   <h5>Đổi mật khẩu thành công </h5>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                   
               </div>
           </form>
       </div>
   </div>
</div>
<div class="changepass_container">
       <div class="changepass_left_menu">
           @include('user.menuleft_infor') 
       </div>
       <div class="changepass_box_infor">
           <div class="changepass_box_inforx">
               <div class="changepass_top-box">
                   <h1>Sản phẩm yêu thích<h1>
               </div>
               <div class="changepass_mainbox" style="padding-left:30px">
                   <div class="changepass_leftboxinfor">
                    <div class="product-list" style="justify-content: space-between;">
                        @foreach ($cartList2 as $item)
                            <div class="product-block product-block2">
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
                                        <p class="pro-price__new">{{number_format($item->product_price)}}đ</p>
                                        <p class="pro-price__old">{{number_format($item->product_price_pre)}}đ</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
   
   @if(Session::has('success'))

   
    @endif
@endsection
@section('Scripts')
<script>
   $(document).ready(function() {
         $('.btnsubmit').click(function(){   
               var id=this.value;
               $('#supplier_id').val(id);
               $('#deleteModal').modal();
           });
        });
</script>


@endsection

@section('script') 
              <script type ='text/JavaScript'>
               alert('Đổi mật khẩu thành công!');
               </script>
               @endsection