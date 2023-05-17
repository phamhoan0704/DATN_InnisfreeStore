@extends('admin.layout_admin')
@section('Content')


<div class="user_add_main">
    <form method="POST">
        {{-- <div class="form_row">
            <h3 style="font-size: 16px;font-weight:bold">Nhập thông tin nhà cung cấp</h3>
        </div> --}}
        @if ($errors->any())
        <span class="error_general">Dữ liệu vừa nhập không hợp lệ. Vui lòng nhập lại!</span>
        @endif 
        <div class="add_form">
            <div class="form_row">
                <label for=""> Tên nhà cung cấp:</label>
                <input type="" name="supplier_name" class="ipn_add" value="{{old('supplier_name')}}"><br>
                @error('supplier_name')
                <div class="error_message">
                    <span style="color: red">{{$message}}</span>
                </div>
                @enderror
            </div> 


            <div class="form_row">
                <label for=""> Số điện thoại:</label>
                <input type="" name="supplier_phone" class="ipn_add" value="{{old('supplier_phone')}}"><br>
                @error('supplier_phone')
                <div class="error_message">
                    <span style="color: red">{{$message}}</span>
                </div>
                @enderror
            </div> 



            <div class="form_row">
                <label for=""> Địa chỉ:</label>
                <input type="" name="supplier_address" class="ipn_add" value="{{old('supplier_address')}}"><br>
                @error('supplier_address')
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

