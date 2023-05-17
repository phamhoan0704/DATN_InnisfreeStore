@extends('user.layout_user')
@section('Content')
    <div class="main_news_detail">
            <div class="news_detail">
                <div class="news_detail_title_content">
                    <a class="tag_news" href="{{route('user.news')}}">Kiến thức chăm sóc da</a>
                    <a class="news_detail_title">{{$newsDetail->news_title}}</a>
                    <div class="entry-divider is-divider small"></div>
                    <p class="news_date">Ngày đăng: 7/5/2023</p>
                    <div class="news_detail_content">
                    {!! $newsDetail->news_content!!}
                    </div>
                </div>
            </div>
            <div class="news_new" style="width:30%">
                <p class="news_detail_title">Bài viết mới</p>
                <div class="entry-divider is-divider small"></div>

                @foreach ($newsData as $item)
                <div style="display: flex;margin:20px">
                <div class="">
                    <a href=""><img src="{{ url('template/image/product_image/'.$item->news_image) }}" alt="" class="product__img" style="width:150px; height:auto; margin-right:10px"></a> 
                 </div>
                 <div class="">
                     <a href="{{route('user.news_detail',['id'=>$item->id])}}" class="news_title" style="font-size:13px">{!!$item->news_title!!}</a>

                </div>
            </div>
                @endforeach
                 </div>

            </div>
    </div>
@endsection