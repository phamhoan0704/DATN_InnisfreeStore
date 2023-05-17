@extends('admin.layout_admin')
@section('Content')
<div class="management_main">
    {{-- <form method="POST" action=""> --}}
            <div id="func">
            <div class="layout-list-row layout-list-btn-wrap">
                <form method="Get" action="">
                    {{-- <label for="" class="label_search">Tìm kiếm</label> --}}
                    <input placeholder="Nhập từ khóa tìm kiếm" class="ipn_search" type="search" name="search_txt"
                        value="{{request()->search_txt}}">
                    <button type="submit" class="btn btn-success" value="" name="" style="display: none">Tìm kiếm</button>
                </form>
                @if (isset($resultSearch['titleSearch']))
                    
                <p>Tìm được <span style="color: red; font-size: 16px;">{{$resultSearch['titleSearch']}}</span> kết quả có chứa '{{$search_txt}}' 
                </p>
                 
                @endif
                <form method="POST" action="">
                    @csrf
                    <!-- thêm -->
                    <button class="btn_add">
                        <a class="btn btn-success" href="{{route('admin.createMail')}}">Gửi thông báo</a>
                    </button>

            </div>
            @if (isset($resultSearch['titleSearch']))
            <div class="layout-list-row">
                <table class="layout_table">
                    @if (isset($resultSearch['titleSearch'])&&$resultSearch['titleSearch']>0)
                    <tr class="title_order">
                        <td class="id_title">Mã</td>
                        <td class="name_title">Tiêu đề</td>
                        <td class="name_title">Nội dung</td>
                        <td class="action_title1">Ngày gửi</td>                   
                    </tr>
                    @endif
                    @endif
                    {{-- Danh sách kết quả tìm kiếm --}}
                    @foreach ($resultSearch['listSearch']??[] as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
     
            <div class="home-tab-content">
                <!-- Danh sách index -->
                <div class="layout-list-row">
                    <table class="layout_table">
                        {{-- Tiêu đề --}}
                        <tr class="title_order">
                            <td class="id_title">Mã</td>
                            <td style="width:25%">Tiêu đề</td>
                            <td style="width:45%">Nội dung</td>
                            <td class="">Ngày gửi</td>
                            <td class="action_title1">Thao tác</td>

                        </tr>
                        {{-- Danh sách --}}

                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><div class="name_hiden">{{$item->title}}</div></td>
                            <td><div class="name_hiden">
                                {!!$item->content!!} </div></td>
                            <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                            <td class="action_title">
                                <a class="btn btn-primary" href="{{route('admin.detailNotify',['id'=>$item->id])}}">Xem chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {{$list->links()}} --}}
                </div>
            </div>
    </form>
</div>
</div>
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
          $('.deleteBtn').click(function(){   
                var id=this.value;
                $('#supplier_id').val(id);
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
@endsection