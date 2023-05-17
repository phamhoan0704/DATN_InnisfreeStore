@extends('admin.layout_admin')
@section('Content')


<div class="user_add_main">
    <form method="POST">
        {{-- <div class="form_row">
            <h3 style="font-size: 16px;font-weight:bold">Nhập thông tin danh mục</h3>
        </div> --}}
        @if ($errors->any())
        <span  class="error_general">Dữ liệu vừa nhập không hợp lệ. Vui lòng nhập lại!</span>
        @endif 
        <div class="add_form">


            <div class="form_row">
                <label for=""> Tên danh mục:</label>
                <input type="" name="category_name" class="ipn_add" value="{{old('category_name')}}"><br>
                @error('category_name')
                <div class="error_message">
                    <span style="color: red">{{$message}}</span>
                </div>
                @enderror
            </div> 


        </div>
        
</div>
@csrf
<div class="btn_div">
    <button class="btn btn-success btn_add_update" type="submit" name="" class="deleteCategoryBtn">Thêm mới</button>
</div>
</form>
</div>


@endsection

