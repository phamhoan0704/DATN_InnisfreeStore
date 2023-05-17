@extends('admin.layout_admin')
@section('head')
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('Content')
<div class="notice homepage__box">
    {{-- <h1>Gửi email</h1> --}}
    <form action="{{route('admin.news.postAdd')}}" method="post">
        @csrf
    <div class="notice_title">
        <label  class="notice_label" for="">Tiêu đề tin tức</label>
        <input type="text" value="" name='news_title'>
    </div>
    <div class="notice_title">
        <label  class="notice_label" for=""> Mô tả</label>
        <textarea type=""  class="form-control detail_txt" name="content1" placeholder="Mô tả" ></textarea>
      </div>
    <div class="notice_title">
        <label  class="notice_label" for=""> Nội dung</label>
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
        CKEDITOR.replace('content1');

</script>
@endsection