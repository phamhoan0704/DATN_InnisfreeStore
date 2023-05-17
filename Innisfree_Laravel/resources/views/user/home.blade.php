
<!-- --------------------------------------------------- -->
@extends('user.layout_user')
@section('Content')
    <div id="home-page">
        <div id="slideShow" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#slideShow" data-slide-to="0" class="active"></li>
                <li data-target="#slideShow" data-slide-to="1"></li>
                <li data-target="#slideShow" data-slide-to="2"></li>
                <li data-target="#slideShow" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ url('template/user/image/Slide/banner1.jpg') }}" alt="">
                </div>

                <div class="item">
                    <img src="{{ url('template/user/image/Slide/banner1.jpg') }}" alt="">
                </div>

                <div class="item">
                    <img src="{{ url('template/user/image/Slide/banner1.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ url('template/user/image/Slide/banner1.jpg') }}" alt="">
                </div>
            </div>


            <!-- Left and right controls -->
            <a class="left carousel-control" href="#slideShow" data-slide="prev">
                <span style=" font-family: 'Glyphicons Halflings'!important;" class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#slideShow" data-slide="next">
                <span style=" font-family: 'Glyphicons Halflings'!important;" class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
        
        
        <div class="home-page-content">
            <div>
                <h3 class="home-page-suggest">Gợi ý cho bạn</h3>
                <div class="product-list">
                    @foreach ($productList2 as $item)
                        <div class="product-block col-4">
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
                                        {{-- <a class="btn-quickview" href="" title="Xem nhanh">
                                            <i class="icon_list">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                                c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                                C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                                c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                                C463.013,282.065,362.256,383.996,255.995,383.996z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                                S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                                S291.28,319.996,255.995,319.996z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </i>
                                        </a> --}}
                                        <a class="btn-buynow" title="Thêm vào danh sách yêu thích" id="{{$item->id}}" href="{{route('user.favorite.add',['id'=>$item->id])}}">

                                            <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/heart.png') }}" alt="">
                                                
                                                {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M443.188,442.208L415.956,142.56c-0.768-8.256-7.68-14.56-15.968-14.56h-48V96c0-25.728-9.952-49.888-28.032-67.968
                                                                C305.876,9.952,281.716,0,255.988,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.82,442.208
                                                                c-1.632,17.856,4.384,35.712,16.48,48.96S114.612,512,132.564,512h246.88c17.952,0,35.168-7.584,47.264-20.832
                                                                S444.788,460.064,443.188,442.208z M191.988,96c0-35.296,28.704-64,64-64c17.184,0,33.28,6.624,45.344,18.656
                                                                c12.064,12.032,18.656,28.16,18.656,45.344v32h-128V96z M403.06,469.6c-6.144,6.688-14.528,10.4-23.648,10.4H132.564
                                                                c-9.088,0-17.504-3.712-23.616-10.432c-6.144-6.72-9.056-15.392-8.224-24.48L126.612,160h33.376v48c0,8.832,7.168,16,16,16
                                                                c8.832,0,16-7.168,16-16v-48h128v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h33.376l25.92,285.12
                                                                C412.116,454.176,409.204,462.88,403.06,469.6z"/>
                                                        </g>
                                                    </g>
                                                </svg>                          --}}
                                            </div>
                                        </a>
                                        <a class="btn-add-to-cart" id="{{$item->id}}" onclick="checkSoldOut('{{$item->product_quantity}}')" title="Thêm vào giỏ" href="{{route('user.cart.add',['id'=>$item->id])}}">
                                            
                                            
                                            <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/shopping-cart.png') }}" alt="">


                                                {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="446.843px" height="446.843px" viewBox="0 0 446.843 446.843" style="enable-background:new 0 0 446.843 446.843;"
                                                xml:space="preserve">
                                            
                                                <path d="M444.09,93.103c-2.698-3.699-7.006-5.888-11.584-5.888H109.92c-0.625,0-1.249,0.038-1.85,0.119l-13.276-38.27
                                                    c-1.376-3.958-4.406-7.113-8.3-8.646L19.586,14.134c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                                    l60.768,23.872l74.381,214.399c-3.283,1.144-6.065,3.663-7.332,7.187l-21.506,59.739c-1.318,3.663-0.775,7.733,1.468,10.916
                                                    c2.24,3.183,5.883,5.078,9.773,5.078h11.044c-6.844,7.616-11.044,17.646-11.044,28.675c0,23.718,19.298,43.012,43.012,43.012
                                                    s43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.044-28.675h93.776c-6.847,7.616-11.048,17.646-11.048,28.675
                                                    c0,23.718,19.294,43.012,43.013,43.012c23.718,0,43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.043-28.675h13.433
                                                    c6.599,0,11.947-5.349,11.947-11.948c0-6.599-5.349-11.947-11.947-11.947H143.647l13.319-36.996
                                                    c1.72,0.724,3.578,1.152,5.523,1.152h210.278c6.234,0,11.751-4.027,13.65-9.959l59.739-186.387
                                                    C447.557,101.567,446.788,96.802,444.09,93.103z M169.659,409.807c-10.543,0-19.116-8.573-19.116-19.116
                                                    s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117S180.202,409.807,169.659,409.807z M327.367,409.807
                                                    c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117c10.542,0,19.116,8.574,19.116,19.117
                                                    S337.909,409.807,327.367,409.807z M402.52,148.149h-73.161V115.89h83.499L402.52,148.149z M381.453,213.861h-52.094v-37.038
                                                    h63.967L381.453,213.861z M234.571,213.861v-37.038h66.113v37.038H234.571z M300.684,242.538v31.064h-66.113v-31.064H300.684z
                                                    M139.115,176.823h66.784v37.038h-53.933L139.115,176.823z M234.571,148.149V115.89h66.113v32.259H234.571z M205.898,115.89v32.259
                                                    h-76.734l-11.191-32.259H205.898z M161.916,242.538h43.982v31.064h-33.206L161.916,242.538z M329.359,273.603v-31.064h42.909
                                                    l-9.955,31.064H329.359z"/>
                                                </svg>                 --}}
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
           {{--  <div class="home-policy">
                <div class="home-policy-list">
                    <div class="home-policy-item">
                        <div class="home-policy-item_icon">
                            <img src="https://theme.hstatic.net/200000287623/1000800165/14/hpl_icon_1.jpg?v=126" alt="Uu dai van chuyen">
                        </div>
                        <div class="home-policy-item_info">
                            ƯU ĐÃI<br>VẬN CHUYỂN
                        </div>
                    </div>
                    <div class="home-policy-item">
                        <div class="home-policy-item_icon">
                            <img src="https://theme.hstatic.net/200000287623/1000800165/14/hpl_icon_2.jpg?v=126" alt="Uu dai van chuyen">
                        </div>
                        <div class="home-policy-item_info">
                            THỂ LOẠI SÁCH<br>PHONG PHÚ
                        </div>
                    </div>
                    <div class="home-policy-item">
                        <div class="home-policy-item_icon">
                            <img src="https://theme.hstatic.net/200000287623/1000800165/14/hpl_icon_3.jpg?v=126" alt="Uu dai van chuyen">
                        </div>
                        <div class="home-policy-item_info">
                            KHUYẾN MẠI<br>HẤP DẪN
                        </div>
                    </div>
                    <div class="home-policy-item">
                        <div class="home-policy-item_icon">
                            <img src="https://theme.hstatic.net/200000287623/1000800165/14/hpl_icon_4.jpg?v=126" alt="Uu dai van chuyen">
                        </div>
                        <div class="home-policy-item_info">
                            HOTLINE<br>03 2838 3979<br>03 3319 3979
                        </div>
                    </div>
                </div> 
            </div>--}}
            <div class="home-tabs">
                <div class="home-tab-title">
                    <div class="home-tab-item active">
                        <span>SẢN PHẨM MỚI</span>
                    </div>
                    <div class="home-tab-item">
                        <span>SẢN PHẨM HOT</span>
                    </div>
                    <div class="line"></div>
                </div>
                <!-- Tab content -->
                <div class="home-tab-content">
                    <!-- Sách mới -->
                    <div class="home-tab-pane active">     
                        <div class="product-list">
                            @foreach ($productList as $item)
                                <div class="product-block col-4">
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
                                                {{-- <a class="btn-quickview" href="" title="Xem nhanh">
                                                    <i class="icon_list">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                                        c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                                        C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                                        c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                                        C463.013,282.065,362.256,383.996,255.995,383.996z"/>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                                        S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                                        S291.28,319.996,255.995,319.996z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </i>
                                                </a>--}}
                                                <a class="btn-buynow" title="Thêm vào danh sách yêu thích" id="{{$item->id}}" href="{{route('user.favorite.add',['id'=>$item->id])}}">

                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/heart.png') }}" alt="">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M443.188,442.208L415.956,142.56c-0.768-8.256-7.68-14.56-15.968-14.56h-48V96c0-25.728-9.952-49.888-28.032-67.968
                                                                        C305.876,9.952,281.716,0,255.988,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.82,442.208
                                                                        c-1.632,17.856,4.384,35.712,16.48,48.96S114.612,512,132.564,512h246.88c17.952,0,35.168-7.584,47.264-20.832
                                                                        S444.788,460.064,443.188,442.208z M191.988,96c0-35.296,28.704-64,64-64c17.184,0,33.28,6.624,45.344,18.656
                                                                        c12.064,12.032,18.656,28.16,18.656,45.344v32h-128V96z M403.06,469.6c-6.144,6.688-14.528,10.4-23.648,10.4H132.564
                                                                        c-9.088,0-17.504-3.712-23.616-10.432c-6.144-6.72-9.056-15.392-8.224-24.48L126.612,160h33.376v48c0,8.832,7.168,16,16,16
                                                                        c8.832,0,16-7.168,16-16v-48h128v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h33.376l25.92,285.12
                                                                        C412.116,454.176,409.204,462.88,403.06,469.6z"/>
                                                                </g>
                                                            </g>
                                                        </svg>                          --}}
                                                    </div>
                                                </a>
                                                <a class="btn-add-to-cart" id="{{$item->id}}" onclick="checkSoldOut('{{$item->product_quantity}}')" title="Thêm vào giỏ" href="{{route('user.cart.add',['id'=>$item->id])}}">
                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/shopping-cart.png') }}" alt="">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="446.843px" height="446.843px" viewBox="0 0 446.843 446.843" style="enable-background:new 0 0 446.843 446.843;"
                                                        xml:space="preserve">
                                                    
                                                        <path d="M444.09,93.103c-2.698-3.699-7.006-5.888-11.584-5.888H109.92c-0.625,0-1.249,0.038-1.85,0.119l-13.276-38.27
                                                            c-1.376-3.958-4.406-7.113-8.3-8.646L19.586,14.134c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                                            l60.768,23.872l74.381,214.399c-3.283,1.144-6.065,3.663-7.332,7.187l-21.506,59.739c-1.318,3.663-0.775,7.733,1.468,10.916
                                                            c2.24,3.183,5.883,5.078,9.773,5.078h11.044c-6.844,7.616-11.044,17.646-11.044,28.675c0,23.718,19.298,43.012,43.012,43.012
                                                            s43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.044-28.675h93.776c-6.847,7.616-11.048,17.646-11.048,28.675
                                                            c0,23.718,19.294,43.012,43.013,43.012c23.718,0,43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.043-28.675h13.433
                                                            c6.599,0,11.947-5.349,11.947-11.948c0-6.599-5.349-11.947-11.947-11.947H143.647l13.319-36.996
                                                            c1.72,0.724,3.578,1.152,5.523,1.152h210.278c6.234,0,11.751-4.027,13.65-9.959l59.739-186.387
                                                            C447.557,101.567,446.788,96.802,444.09,93.103z M169.659,409.807c-10.543,0-19.116-8.573-19.116-19.116
                                                            s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117S180.202,409.807,169.659,409.807z M327.367,409.807
                                                            c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117c10.542,0,19.116,8.574,19.116,19.117
                                                            S337.909,409.807,327.367,409.807z M402.52,148.149h-73.161V115.89h83.499L402.52,148.149z M381.453,213.861h-52.094v-37.038
                                                            h63.967L381.453,213.861z M234.571,213.861v-37.038h66.113v37.038H234.571z M300.684,242.538v31.064h-66.113v-31.064H300.684z
                                                            M139.115,176.823h66.784v37.038h-53.933L139.115,176.823z M234.571,148.149V115.89h66.113v32.259H234.571z M205.898,115.89v32.259
                                                            h-76.734l-11.191-32.259H205.898z M161.916,242.538h43.982v31.064h-33.206L161.916,242.538z M329.359,273.603v-31.064h42.909
                                                            l-9.955,31.064H329.359z"/>
                                                        </svg>                 --}}
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
                        <div class="home-tab-pane-btn">
                            <a href="{{route('category')}}" class="btn-more">Xem thêm</a>
                        </div>
                    </div>
                    <div class="home-tab-pane">
                        <!-- Sách bán chạy -->
                        <div class="product-list">
                            @foreach ($productListBestSeller as $item)
                                <div class="product-block col-4">
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
                                                {{-- <a class="btn-quickview" href="" title="Xem nhanh">
                                                    <i class="icon_list">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                                        c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                                        C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                                        c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                                        C463.013,282.065,362.256,383.996,255.995,383.996z"/>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                                        S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                                        S291.28,319.996,255.995,319.996z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                
                                                    </i> 
                                                </a>--}}
                                                <a class="btn-buynow" title="Thêm vào danh sách yêu thích" id="{{$item->id}}" href="{{route('user.favorite.add',['id'=>$item->id])}}">
                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/heart.png') }}">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M443.188,442.208L415.956,142.56c-0.768-8.256-7.68-14.56-15.968-14.56h-48V96c0-25.728-9.952-49.888-28.032-67.968
                                                                        C305.876,9.952,281.716,0,255.988,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.82,442.208
                                                                        c-1.632,17.856,4.384,35.712,16.48,48.96S114.612,512,132.564,512h246.88c17.952,0,35.168-7.584,47.264-20.832
                                                                        S444.788,460.064,443.188,442.208z M191.988,96c0-35.296,28.704-64,64-64c17.184,0,33.28,6.624,45.344,18.656
                                                                        c12.064,12.032,18.656,28.16,18.656,45.344v32h-128V96z M403.06,469.6c-6.144,6.688-14.528,10.4-23.648,10.4H132.564
                                                                        c-9.088,0-17.504-3.712-23.616-10.432c-6.144-6.72-9.056-15.392-8.224-24.48L126.612,160h33.376v48c0,8.832,7.168,16,16,16
                                                                        c8.832,0,16-7.168,16-16v-48h128v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h33.376l25.92,285.12
                                                                        C412.116,454.176,409.204,462.88,403.06,469.6z"/>
                                                                </g>
                                                            </g>
                                                        </svg>                          --}}
                                                    </div>
                                                </a>
                                                <a class="btn-add-to-cart" id="{{$item->id}}" onclick="checkSoldOut('{{$item->product_quantity}}')" title="Thêm vào giỏ hàng" href="{{route('user.cart.add',['id'=>$item->id])}}">
                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/shopping-cart.png') }}" alt="">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="446.843px" height="446.843px" viewBox="0 0 446.843 446.843" style="enable-background:new 0 0 446.843 446.843;"
                                                        xml:space="preserve">
                                                    
                                                        <path d="M444.09,93.103c-2.698-3.699-7.006-5.888-11.584-5.888H109.92c-0.625,0-1.249,0.038-1.85,0.119l-13.276-38.27
                                                            c-1.376-3.958-4.406-7.113-8.3-8.646L19.586,14.134c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                                            l60.768,23.872l74.381,214.399c-3.283,1.144-6.065,3.663-7.332,7.187l-21.506,59.739c-1.318,3.663-0.775,7.733,1.468,10.916
                                                            c2.24,3.183,5.883,5.078,9.773,5.078h11.044c-6.844,7.616-11.044,17.646-11.044,28.675c0,23.718,19.298,43.012,43.012,43.012
                                                            s43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.044-28.675h93.776c-6.847,7.616-11.048,17.646-11.048,28.675
                                                            c0,23.718,19.294,43.012,43.013,43.012c23.718,0,43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.043-28.675h13.433
                                                            c6.599,0,11.947-5.349,11.947-11.948c0-6.599-5.349-11.947-11.947-11.947H143.647l13.319-36.996
                                                            c1.72,0.724,3.578,1.152,5.523,1.152h210.278c6.234,0,11.751-4.027,13.65-9.959l59.739-186.387
                                                            C447.557,101.567,446.788,96.802,444.09,93.103z M169.659,409.807c-10.543,0-19.116-8.573-19.116-19.116
                                                            s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117S180.202,409.807,169.659,409.807z M327.367,409.807
                                                            c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117c10.542,0,19.116,8.574,19.116,19.117
                                                            S337.909,409.807,327.367,409.807z M402.52,148.149h-73.161V115.89h83.499L402.52,148.149z M381.453,213.861h-52.094v-37.038
                                                            h63.967L381.453,213.861z M234.571,213.861v-37.038h66.113v37.038H234.571z M300.684,242.538v31.064h-66.113v-31.064H300.684z
                                                            M139.115,176.823h66.784v37.038h-53.933L139.115,176.823z M234.571,148.149V115.89h66.113v32.259H234.571z M205.898,115.89v32.259
                                                            h-76.734l-11.191-32.259H205.898z M161.916,242.538h43.982v31.064h-33.206L161.916,242.538z M329.359,273.603v-31.064h42.909
                                                            l-9.955,31.064H329.359z"/>
                                                        </svg>                 --}}
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
                        <div class="home-tab-pane-btn">
                            <a href="{{route('category')}}" class="btn-more">Xem thêm</a>
                        </div>
                    </div>
                    <div class="home-tab-pane">
                        <!-- Sách hot deal -->
                        <div class="product-list">
                            @foreach ($productHotDeals as $item)
                                <div class="product-block col-5">
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
                                                {{-- <a class="btn-quickview" href="" title="Xem nhanh">
                                                    <i class="icon_list">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105
                                                                        c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886
                                                                        C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128
                                                                        c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424
                                                                        C463.013,282.065,362.256,383.996,255.995,383.996z"/>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333
                                                                        S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64
                                                                        S291.28,319.996,255.995,319.996z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </i>
                                                </a> --}}
                                                <a class="btn-buynow" title="Thêm vào danh sách yêu thích" href="{{route('user.favorite.add',['id'=>$item->id])}}" id="{{$item->id}}" >
                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/heart.png') }}" alt="">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M443.188,442.208L415.956,142.56c-0.768-8.256-7.68-14.56-15.968-14.56h-48V96c0-25.728-9.952-49.888-28.032-67.968
                                                                        C305.876,9.952,281.716,0,255.988,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.82,442.208
                                                                        c-1.632,17.856,4.384,35.712,16.48,48.96S114.612,512,132.564,512h246.88c17.952,0,35.168-7.584,47.264-20.832
                                                                        S444.788,460.064,443.188,442.208z M191.988,96c0-35.296,28.704-64,64-64c17.184,0,33.28,6.624,45.344,18.656
                                                                        c12.064,12.032,18.656,28.16,18.656,45.344v32h-128V96z M403.06,469.6c-6.144,6.688-14.528,10.4-23.648,10.4H132.564
                                                                        c-9.088,0-17.504-3.712-23.616-10.432c-6.144-6.72-9.056-15.392-8.224-24.48L126.612,160h33.376v48c0,8.832,7.168,16,16,16
                                                                        c8.832,0,16-7.168,16-16v-48h128v48c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-48h33.376l25.92,285.12
                                                                        C412.116,454.176,409.204,462.88,403.06,469.6z"/>
                                                                </g>
                                                            </g>
                                                        </svg>                          --}}
                                                    </div>
                                                </a>
                                                <a class="btn-add-to-cart" id="{{$item->id}}" onclick="checkSoldOut('{{$item->product_quantity}}')" title="Thêm vào giỏ" href="{{route('user.cart.add',['id'=>$item->id])}}">
                                                    <div class="icon_list">
                                                <img src="{{ url('template/user/image/icon/shopping-cart.png') }}" alt="">

                                                        {{-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="446.843px" height="446.843px" viewBox="0 0 446.843 446.843" style="enable-background:new 0 0 446.843 446.843;"
                                                        xml:space="preserve">
                                                    
                                                        <path d="M444.09,93.103c-2.698-3.699-7.006-5.888-11.584-5.888H109.92c-0.625,0-1.249,0.038-1.85,0.119l-13.276-38.27
                                                            c-1.376-3.958-4.406-7.113-8.3-8.646L19.586,14.134c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                                            l60.768,23.872l74.381,214.399c-3.283,1.144-6.065,3.663-7.332,7.187l-21.506,59.739c-1.318,3.663-0.775,7.733,1.468,10.916
                                                            c2.24,3.183,5.883,5.078,9.773,5.078h11.044c-6.844,7.616-11.044,17.646-11.044,28.675c0,23.718,19.298,43.012,43.012,43.012
                                                            s43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.044-28.675h93.776c-6.847,7.616-11.048,17.646-11.048,28.675
                                                            c0,23.718,19.294,43.012,43.013,43.012c23.718,0,43.012-19.294,43.012-43.012c0-11.029-4.2-21.059-11.043-28.675h13.433
                                                            c6.599,0,11.947-5.349,11.947-11.948c0-6.599-5.349-11.947-11.947-11.947H143.647l13.319-36.996
                                                            c1.72,0.724,3.578,1.152,5.523,1.152h210.278c6.234,0,11.751-4.027,13.65-9.959l59.739-186.387
                                                            C447.557,101.567,446.788,96.802,444.09,93.103z M169.659,409.807c-10.543,0-19.116-8.573-19.116-19.116
                                                            s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117S180.202,409.807,169.659,409.807z M327.367,409.807
                                                            c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117c10.542,0,19.116,8.574,19.116,19.117
                                                            S337.909,409.807,327.367,409.807z M402.52,148.149h-73.161V115.89h83.499L402.52,148.149z M381.453,213.861h-52.094v-37.038
                                                            h63.967L381.453,213.861z M234.571,213.861v-37.038h66.113v37.038H234.571z M300.684,242.538v31.064h-66.113v-31.064H300.684z
                                                            M139.115,176.823h66.784v37.038h-53.933L139.115,176.823z M234.571,148.149V115.89h66.113v32.259H234.571z M205.898,115.89v32.259
                                                            h-76.734l-11.191-32.259H205.898z M161.916,242.538h43.982v31.064h-33.206L161.916,242.538z M329.359,273.603v-31.064h42.909
                                                            l-9.955,31.064H329.359z"/>
                                                        </svg>                 --}}
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
                        <div class="home-tab-pane-btn">
                            <a href="{{route('category')}}" class="btn-more">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="home-page-suggest">Ưu đãi và giao hàng</h3>
            <div class="home-endow">
                <div class="home-endow_1">
                    <div class="home-endow_detail">
                        <a href="" class="home-endow_icon">
                            <img src="{{ url('template/user/image/icon/ticket.png') }}" alt="" class="img-logo">
                        </a>
                    </div>
                    <p>Voucher ưu đãi</p>
                    <a href="" id="mbs_detail">Chi tiết</a>
                </div>
                <div class="home-endow_1">
                    <div class="home-endow_detail">
                        <a href="" class="home-endow_icon">
                            <img src="{{ url('template/user/image/icon/fast-delivery.png') }}" alt="" class="img-logo">
                        </a>
                    </div>
                    <p>Dịch vụ giao hàng</p>
                    <a href="" id="mbs_detail">Chi tiết</a>
                </div>
            </div>
                <div class="home-new-banner">
        </div>
       
        
        
            


            {{-- <div class="hnb-list">
                <div class="hnb-item">
                    <a href="" class="hnb-item-link">
                        
                        <img class="hnb-item-img " src="{{ url('template/user/') }}" alt=" ">
                    </a>
                </div>
                <div class="hnb-item ">
                    <a href=" " class="hnb-item-link ">
                        <img class="hnb-item-img " src="{{ url('template/user/image/new-banner/hnb_img_2.jpg') }}" alt=" ">
                    </a>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        @foreach ($productList as $item)
            @if($item->product_quantity == 0) 
                document.getElementById({{$item->id}}).removeAttribute("href");
            @endif
        @endforeach
        @foreach ($productListBestSeller as $item)
            @if($item->product_quantity == 0) 
                document.getElementById({{$item->id}}).removeAttribute("href");
            @endif
        @endforeach
        @foreach ($productHotDeals as $item)
            @if($item->product_quantity == 0) 
                document.getElementById({{$item->id}}).removeAttribute("href");
            @endif
        @endforeach
        function checkSoldOut(quantity) {
            if(quantity == '0') 
            {
                document.getElementById('notice').style.display = 'block';
                document.getElementById("showSoldOutNotice").innerHTML = "Sản Phẩm Đã Hết Hàng";
            }
        }
        
        function closePopup()
        {
            document.getElementById("notice").style.display = "none"; 
        }   
    </script>

    <script src="{{asset('template/user/js/home_tab.js')}}"></script>

    @endsection
@extends('user.footer')