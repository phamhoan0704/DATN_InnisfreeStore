@extends('admin.layout_admin')
@section('head')
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
@endsection
@section('Content')
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="user_add_main">
    {{-- <div class="form_row">
      <h3 class="" style="font-size: 16px;font-weight:bold">Nhập thông tin sản phẩm</h3>
    </div> --}}
    @if ($errors->any())
    <span class="error_general">Dữ liệu vừa nhập không hợp lệ. Vui lòng nhập lại!</span>
    @endif 
    <div class="add_form">


      <div class="form_row">
        <label for="">Tên sản phẩm</label>
        <input type="" name="product_name" class="ipn_add" id="" placeholder="Tên sản phẩm" value="{{old('product_name')}}">
        @error('product_name')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      <div class="form_row">
        <label for="">Giá gốc</label>
        <input type="" name="product_price_pre" class="ipn_add" id="" placeholder="Giá gốc" value="{{old('product_price_pre')}}">
        @error('product_price_pre')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      <div class="form_row">
        <label for="">Giá giảm</label>
        <input type="" name="product_price" class="ipn_add" id="" placeholder="Giá giảm" value="{{old('product_price')}}">
        @error('product_price')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      <div class="form_row">
        <label for="">Số lượng</label>
        <input type="" name="product_quantity" class="ipn_add" id="" placeholder="Số lượng" value="{{old('product_quantity')}}">
        @error('product_quantity')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      {{-- <div class="form_row">
        <label for="">Hình ảnh</label>
        <input type="file" name="product_image" class="ipn_add" id="" value="">
        @error('product_image')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div> --}}
      

      <div class="form_row">
        <label for="">Năm sản xuất</label>
        <input type="date" name="product_year" class="ipn_add" value="{{old('product_year')}}">
        @error('product_year')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      <div class="form_row">
        <label for="">Hạn sử dụng</label>
        <input type="date" name="product_expiry" class="ipn_add" value="{{old('product_expiry')}}">
      </div>
      @error('product_expiry')
      <div class="form_row">
          <span style="color: red">{{$message}}</span>
      </div>
      @enderror


      <div class="form_row">
        <label for="">Dung tích</label>
        <input type="text" name="product_capacity" class="ipn_add" value="{{old('product_capacity')}}">
        @error('product_year')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>


      <div class="form_row">
        <label for="">Thành phần</label>
        <input type="text" name="product_ingredient" class="ipn_add" value="{{old('product_ingredient')}}">
        @error('product_year')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
  
      </div>

      <div class="form_row">
        <label for="">Lưu ý sử dụng</label>
        <input type="text" name="product_useNote" class="ipn_add" value="{{old('product_useNote')}}">
        @error('product_year')
        <div class="error_message">
            <span style="color: red">{{$message}}</span>
        </div>
        @enderror
      </div>

      {{-- <div class="form_row">
        <label for="">Tác giả</label>
        <select name="author_id" class="ipn_add">
          @if (!empty($author))
          @foreach ($author as $item)
          <option value="{{$item->id??old('author_id')}}" @if(old('author_id') == $item->id) selected @endif>{{$item->author_name}}</option>
          @endforeach
          @endif
        </select>
      </div> --}}
      
      <div class="form_row">
        <label for="">Nhà cung cấp</label>
        <select name="supplier" class="ipn_add">
          @if (!empty($supplier))
          @foreach ($supplier as $item)
          <option value="{{$item->id}}" @if(old('supplier') == $item->id) selected @endif>{{$item->supplier_name}}</option>
          @endforeach
          @endif
        </select>
      </div>
      <div class="form_row">
        <label for="">Danh mục</label>
        <select name="category" class="ipn_add">
          @if (!empty($category))
          @foreach ($category as $item)
          <option value="{{$item->id}}"  @if(old('category') == $item->id) selected @endif>{{$item->category_name}}</option>
          @endforeach
          @endif
        </select>
      </div>
      <div style="width:100%"></div>
    </div>
    <div class="detail_div">
     
      <div class="form_row" style="width:100%" id="detail_info">
        <label for="" class="detail_title"><img  class="detail_title_image" src="{{ url('template/user/image/icon/plus1.png') }}">  Thông tin chi tiết  </label>
        <div class="form-group detail_form" id="detail_Show">
          <textarea type="" name="product_detail" class="form-control detail_txt" id="content" placeholder="Mô tả">{{old('product_detail')}}</textarea>
        </div>
      </div>
    </div>
     

    <div class="detail_div">
      <div class="form_row" id="detail_info1" style="width:100%">
        <label for="" class="detail_title"><img  class="detail_title_image" src="{{ url('template/user/image/icon/plus1.png') }}"> Hướng dẫn sử dụng   </label>
        <div class="form-group detail_form" id="detail_Show1" >
          <textarea type="" name="product_manual" class="form-control detail_txt" id="content2" placeholder="Hướng dẫn sử dụng"> {{old('product_manual')}}</textarea>
        </div>
      </div>
    </div>

      
    <div class="detail_div">
      <div class="">
        <div class="file-upload">
          {{-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> --}}
        
          <div class="image-upload-wrap">
            <input class="file-upload-input" type='file' name="product_image" onchange="readURL(this);" accept="image/*" />
            <div class="drag-text">
              <h3>Kéo thả file ảnh hoặc chọn file ảnh tại đây</h3>
            </div>
          </div>
          <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
              <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
            </div>
          </div>
  
        </div>
    </div>
    </div>
    <div class="btn_div">
        <button class="btn btn-success btn_add_update" type="submit" class="deleteCategoryBtn">Thêm mới</button>
    </div>

</form>
</div>
@endsection
@section('footer')
<script>
  // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
        CKEDITOR.replace('content');
        CKEDITOR.replace('content2');


        function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});



</script>

<script>

  var button = document.getElementById('detail_info'); // Assumes element with id='button'

button.onclick = function() {
    var div = document.getElementById('detail_Show');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}


var button1 = document.getElementById('detail_info1'); // Assumes element with id='button'

button1.onclick = function() {
    var div = document.getElementById('detail_Show1');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}
  </script>
@endsection