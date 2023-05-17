@extends('admin.layout_admin')
@section('Content')
{{-- Model --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.category.delete')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Xóa danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                    <h5>Bạn có chắc chắn xóa danh mục này không? </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="management_main">

    {{-- <form method="POST" action=""> --}}
        <div class="home-tabs">
            <div class="home-tab-title">
                <div class="home-tab-item" id="home-tab-item-all">
                    <a id="home-tab-item-all-link" href="{{route('admin.category.index')}}">Tất cả</a>
                    <span>{{$count[0]}}</span>
                </div>
                <div class="home-tab-item" id="home-tab-item-active">
                    <a id="home-tab-item-active-link" href="{{route('admin.category.index',['name'=>'active'])}}">Đang hoạt
                        động</a>
                    <span>{{$count[1]}}</span>
                </div>
                <div class="home-tab-item" id="home-tab-item-hide">
                    <a id="home-tab-item-hide-link" href="{{route('admin.category.index',['name'=>'hide'])}} " >Ngừng hoạt động</a>
                    <span>{{$count[2]}}</span>
                </div>
  <button onclick="myFunction()" type="button" style="border: none;background-color:white; margin-left:20px"><img style="width:20px" src="{{ url('template/user/image/icon/down-chevron.png') }}" alt=""></button>

            </div>
            <div id="func">

           
            <div class="layout-list-row layout-list-btn-wrap" >
                {{-- <table> --}}

                    {{-- <tr>    <!-- tìm kiếm danh mục --> --}}
                        {{-- <td> --}}
                            <form method="Get" action="">
                                {{-- <label for="" class="label_search">Tìm kiếm</label> --}}
                                <input placeholder="Nhập tên danh mục" class="ipn_search" type="search"
                                name="search_txt" value="{{request()->search_txt}}">
                                <button type="submit" class="btn btn-success" value="" name="" style="display: none">Tìm kiếm</button>
                            </form>
                            @if (isset($resultSearch['titleSearch']))
                    
                        <p>Tìm được <span style="color: red; font-size: 16px;">{{$resultSearch['titleSearch']}}</span> kết quả có chứa '{{$search_txt}}' 
                        </p>
                         
                        @endif
                    
                        {{-- </td> --}}
                        <form method="POST" action="">  
                            @csrf 
                            {{-- Ẩn /Hien tất cả --}}
                            {{-- <td> --}}
                                <button type="submit" name="" value="" class="btn btn-success btn_hidden" formaction="{{route('admin.category.active-category',['name'=>'hidden'])}}">Dừng hoạt động</button>
                            {{-- </td> --}}
                            {{-- <td> --}}
                                <button type="submit" name="" class="btn btn-success btn_hidden"  formaction="{{route('admin.category.active-category',['name'=>'show'])}}">Kích hoạt</button>
                            {{-- </td> --}}
                            {{-- <td> --}}
                                {{-- <button type="submit" name="" class="btn btn-success btn_hidden"  formaction="">Xóa</button> --}}
                            {{-- </td> --}}
                            <!-- thêm danh mục -->
                                {{-- <td> --}}
                                    <button class="btn_add">
                                        <a class="btn btn-success" href="{{route('admin.category.create')}}">Thêm mới</a>
                                    </button>
                                {{-- </td> --}}
                        {{-- </tr> --}}
                {{-- </table> --}}
            </div>
            @if (isset($resultSearch['titleSearch']))
            <div class="layout-list-row">
                <table class="layout_table">
                    
                    {{-- Tiêu đề kết quả --}}
                    @if (isset($resultSearch['titleSearch'])&&$resultSearch['titleSearch']>0)
                    <tr class="title_order" >
                        <td class="ckb_title">
                            <input type="checkbox" name="" id="checkall2" onclick="selects2(this)">
                        </td>
                        <td class="id_title">Mã</td>
                        <td class="name_title">Tên danh mục</td>
                        <td class="name_title">Tổng sản phẩm</td>
                        <td class="createdDate_title">Ngày tạo</td>
                        <td class="updateDate_title">Ngày cập nhật</td>
                        <td colspan="3" class="action_title1">Thao tác</td>
                    </tr>
                    @endif
                    @endif
                    {{-- Danh sách kết quả tìm kiếm --}}
                    @foreach ($resultSearch['categorySearch']??[] as $item)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{$item->id}}" class="check ads_Checkbox"
                                name="ids[{{$item->id}}]" onclick="check(this)">
                        </td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category_name}}</td>
                        <td></td>
                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                        <td class="action_title">@if ($item->active==0)
                            <button class="btn btn-success" type="submit" name=""
                                formaction="{{route('admin.category.active-category',['name'=>'show','id'=>$item->id])}}">Hiện</button>
                            @else
                            <button class="btn btn-success" type="submit" name=""
                                formaction="{{route('admin.category.active-category',['name'=>'hidden','id'=>$item->id])}}">Ẩn</button>
                            @endif
                  
                            <a class="btn btn-primary" href="{{route('admin.category.edit',['id'=>$item->id])}}">Cập
                                nhật</a>
                        
                            <button type="button" class="btn btn-danger deleteCategoryBtn "
                                value="{{$item->id}}">Xóa</button>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
            <div class="home-tab-content">
                <!-- Danh sách index -->
                <div class="layout-list-row">
                    <table class="layout_table">
                        {{-- Tiêu đề --}}
                        <tr class="title_order" >
                            <td class="ckb_title">
                                <input type="checkbox" name="" id="checkall2" onclick="selects2(this)">
                            </td>
                            <td class="id_title">Mã</td>
                            <td class="name_title">Tên danh mục</td>
                            <td class="name_title">Tổng sản phẩm</td>
                            <td class="createdDate_title">Ngày tạo</td>
                            <td class="updateDate_title">Ngày cập nhật</td>
                            <td colspan="3" class="action_title1">Thao tác</td>
                        </tr>
                        {{-- Danh sách --}}
                        
                        @foreach ($categoryList as $item)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{$item->id}}" class="check2" name="ids[{{$item->id}}]"
                                    onclick="check2(this)">
                            </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category_name}}</td>
                            <td></td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                            <td class="action_title">@if ($item->active==0)
                                <button class="btn btn-success" type="submit" name=""
                                    formaction="{{route('admin.category.active-category',['name'=>'show','id'=>$item->id])}}">Hiện</button>
                                @else
                                <button class="btn btn-success" type="submit" name=""
                                    formaction="{{route('admin.category.active-category',['name'=>'hidden','id'=>$item->id])}}">Ẩn</button>
                                @endif
                        
                                <a class="btn btn-primary" href="{{route('admin.category.edit',['id'=>$item->id])}}">Cập
                                    nhật</a>
                            
                                <button type="button" class="btn btn-danger deleteCategoryBtn "
                                    value="{{$item->id}}">Xóa</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div>
                        {{$categoryList->links()}}
                    </div>
                </div>

            </div>
    </form>

</div>

</div>
{{-- Số trang --}}


<script>
    var chk=document.getElementsByClassName('check');  
        var checkall=document.getElementById('checkall'); 
        function selects(x) { 
            for(var i=0; i<chk.length; i++){   
                    chk[i].checked = x.checked ? true:false
            } 
        }  
        function check(x) {
            var dem = 0 
            for(var i=0; i<chk.length; i++){   
                if(chk[i].checked == false) {
                    checkall.checked = false;
                } else dem++;
            } 
            if(dem == chk.length) checkall.checked = true;
        }
</script>
<script>
    var chk2=document.getElementsByClassName('check2');  
    var checkall2=document.getElementById('checkall2'); 
    function selects2(x) { 
        for(var i=0; i<chk2.length; i++){   
                chk2[i].checked = x.checked ? true:false
        } 
    }  
    function check2(x) {
        var dem = 0 
        for(var i=0; i<chk2.length; i++){   
            if(chk2[i].checked == false) {
                checkall2.checked = false;
            } else dem++;
        } 
        if(dem == chk2.length) checkall2.checked = true;
    }

</script>

@endsection
@section('Scripts')
<script>
    $(document).ready(function() {
          $('.deleteCategoryBtn').click(function(){   
                var category_id=this.value;
                $('#category_id').val(category_id);
                $('#deleteModal').modal();
            });
         });


function myFunction() {
  var x = document.getElementById("func");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


</script>
<script>
    window.onscroll = function() {myFunction1()};
    
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    
    function myFunction1() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
    </script>


{{-- <script>
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