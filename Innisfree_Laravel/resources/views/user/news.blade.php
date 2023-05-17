@extends('user.layout_user')
@section('Content')
    <div class="main_news">
        <div class="news_list">

            @foreach ($newsData as $item)
            <div class="news_item">
                <div class="news_image">
                   <a href=""><img src="{{ url('template/image/product_image/'.$item->news_image) }}" alt="" class="product__img"></a> 
                </div>
                <div class="news_title_content">
                    <a href="{{route('user.news_detail',['id'=>$item->id])}}" class="news_title">{!!$item->news_title!!}</a>
                    <p class="news_date">Ngày đăng: {{$item->created_at}}</p>
                    <div class="news_content">
                    <p>{!!$item->news_description!!}</p>

                    </div>
                </div>
            </div>
            @endforeach



            {{-- <div class="news_item">
                <div class="news_image">
                   <a href=""><img src="../template/image/product_image/bangphanmat.jpg" alt="" class="product__img"></a> 
                </div>
                <div class="news_title_content">
                    <a class="news_title">Set tinh chất và kem dưỡng cấp ẩm chuyên sâu trà xanh innisfree Green Tea Seed Serum & Cream Combo</a>
                    <p class="news_date">Ngày đăng: 7/5/2023</p>
                    <div class="news_content">
                    <p>Set tinh chất và kem dưỡng cấp ẩm chuyên sâu trà xanh innisfree Green Tea Seed Serum & Cream ComboSet tinh chất và kem dưỡng cấp ẩm chuyên sâu trà xanh innisfree Green Tea Seed Serum & Cream ComboSet tinh chất và kem dưỡng cấp ẩm chuyên sâu trà xanh innisfree Green Tea Seed Serum & Cream ComboSet tinh chất và kem dưỡng cấp ẩm chuyên sâu trà xanh innisfree Green Tea Seed Serum & Cream Combo</p>

                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection