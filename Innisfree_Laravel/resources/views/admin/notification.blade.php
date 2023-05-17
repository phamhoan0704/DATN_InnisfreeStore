@extends('admin.layout_admin')
@section('head')
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('Content')
<div class="notice homepage__box">
    {{-- <h1>Gửi email</h1> --}}
    <form action="{{route('admin.sendMail')}}" method="post">
        @csrf
    <div class="notice_title">
        <label  class="notice_label" for="">Tiêu đề thông báo</label>
        <input type="text" value="" name='title'>
    </div>
    
    <div class="notice_title">
        <label  class="notice_label" for=""> Nội dung thông báo</label>
        <textarea type=""  class="form-control detail_txt" name="content" placeholder="Mô tả" ></textarea>
      </div>
      
   
</div>
<div class="btn_div">
  <button class="btn btn-success btn_add_update" type="submit"> Gửi</button>

</div>
</form>
@endsection
@section('footer')
<script>
  // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
        CKEDITOR.replace('content');
</script>
@endsection