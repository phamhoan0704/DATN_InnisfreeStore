@extends('admin.layout_admin')
@section('Content')

    <div class="homepage_main">  
        <div class="homepage__box">
            {{-- <div class="title-box title_chart"  style="margin:0px auto 30px auto">Báo cáo tình trạng đơn hàng </div> --}}
            <div class="to-do-list-parent">

            <div class="to-do-list">
                <div class="to_do1 todo">
                    <a href="{{route('admin.order.index',['status'=>'0'])}}" class="to-do-item">
                        <p class="item-title">{{$orderStatus0->count()}} Chờ xác nhận </p>
                    </a>
                </div>
                <div class="to_do2 todo">
                    <a href="{{route('admin.order.index',['status'=>'1'])}}" class="to-do-item">
                        <p class="item-title">{{$orderStatus1->count()}} Đang chuẩn bị hàng</p>
                    </a>
                </div>
                <div class="to_do3 todo">
                    <a href="{{route('admin.order.index',['status'=>'2'])}}" class="to-do-item">
                        <p class="item-title">{{$orderStatus2->count()}} Đang vận chuyển</p>
                    </a>    
                </div>
                <div class="to_do4 todo">
                    <a href="{{route('admin.order.index',['status'=>'3'])}}" class="to-do-item">
                        <p class="item-title">{{$orderStatus3->count()}}    Giao hàng thành công</p>
                    </a>
                </div>
            </div>

               {{-- <div class="to_do4">
                <a href="product_management_ad.php" class="to-do-item">
                    <p class="item-title">{{$productSoldOut->count()}}<br>Sản phẩm hết hàng</p>
                </a>
               </div> --}}
            {{-- <div class="title-box title_chart" style="margin:auto">Báo cáo doanh thu</div>     --}}

                {{-- <div id="linechart"></div> --}}
                <div id = "container" style = "width: 50%; height: 500px; margin: 0 auto">
                </div>
            {{-- </div> --}}
        </div>

        </div>
        <div class="homepage__box2">
            {{-- <div class="homepage__box sale-analysis" style="border-top:1px solid #ccc">
            <div class="title-box title_chart" style="margin:auto">Báo cáo doanh thu</div>    

                <div id="linechart"></div>
                <div id = "container" style = "width: 50%; height: 500px; margin: 0 auto">
                    
            </div>
               --}}
                <div class="" style="display: flex;flex-wrap:wrap;justify-content: space-between;">
                    <div class="box_item">
                        <div class="title-box title_chart" >Danh mục sản phẩm bán chạy</div>  
                        <div id="piechart_3d" style="margin-bottom: 50px"></div>
                    </div>

                    <div class="box_item">
                        <div class="title-box title_chart" >Sản phẩm bán chạy</div>  
                        <div id="piechart_3d_2" style="margin-bottom: 50px"></div>
                    </div>

            </div>

            </div>
            <div class="sale_management-info">

            {{-- <div class="tabs">
                <div class="tabs-title">
                    <div class="tabs-item active">
                        <span>Sản phẩm bán chạy</span>
                    </div>
                    <div class="tabs-item">
                        <span>Danh mục bán chạy</span>
                    </div>
                    <div class="tab-line"></div>
                </div>


                <!-- Tab content -->
                <div class="tabs-content">
                    <div class="tabs-pane active">
                        <div class="title-box">Báo cáo danh sách sản phẩm bán chạy</div>   
                        <!-- Sách bán chạy -->
                        <table class="sale_management-table">
                            <thead>
                                <tr>
                                    <td style="width: 15%;">Mã sản phẩm</td>
                                    <td style="width: 30%;">Tên sản phẩm</td>
                                    <td style="text-align: right; width: 15%;">Giá Bán</td>
                                    <td style="text-align: right; width: 20%;">Số lượng đã bán</td>
                                    <td style="text-align: right; width: 20%;">Doanh Mục</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProductBestSeller as $item)
                                    <tr>
                                        <td style="width: 15%;">{{$item->product_id}}</td>
                                        <td style="width: 30%;">{{$item->product_name}}</td>
                                        <td style="text-align: right; width: 15%;">{{number_format($item->product_price)}}</td>
                                        <td style="text-align: right; width: 20%;">{{$item->sale_amount}}</td>
                                        <td style="text-align: right; width: 20%;">{{$item->category_name}}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   
                    <div class="tabs-pane">
                        <!-- Thống kê theo danh mục -->
                        <table class="sale_management-table">
                            <thead>
                                <tr>
                                    <td style="width: 25%">Mã danh mục</td>
                                    <td style="width: 50%">Tên danh mục</td>
                                    <td style="width: 25%">Số lượng sản phẩm đã bán</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listCategoryBestSeller as $item)
                                    <tr>
                                        <td style="width: 25%">{{$item->id}}</td>
                                        <td style="width: 50%">{{$item->category_name}}</td>
                                        <td style="text-align: right; width: 25%">{{number_format($item->sale_amount)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
                
                
        </div>
    </div>
        <!-- <div class="homepage__box sale-analysis">
            <div class="title-box">Phân Tích Bán Hàng
                <p style="margin-bottom: 0;">Tổng quan về doanh thu của cửa hàng trong năm</p>
            </div>
            <div id="linechart"></div>
        </div> -->
    </div>
    
    <script src="{{asset('template/admin/js/tabs.js')}}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Tháng');
            data.addColumn('number', 'Doanh Thu');

            data.addRows([
                @foreach ($lineChart as $item)
                    [{{$item->sale_amount}},{{$item->total}}],
                @endforeach

                // [1,2],
                // [3,9],
                // [4,6],
                // [5,8],
            ]);

            var options = {
                chart: {
                title: '',
                subtitle: ''
                }
            };

            var chart = new google.charts.Line(document.getElementById('linechart'));

            chart.draw(data, google.charts.Line.convertOptions(options));
            }
             
        function dropdownOption(value,previousDate,currentDate)
        {
            @if( str_contains(url()->full(),'currentDate') )
                var url = "http://127.0.0.1:8000/admin/report/index?previousDate={{$previousDate}}&currentDate={{$currentDate}}&sort_by=" + value;
            @else
            var url = "http://127.0.0.1:8000/admin/report/index?sort_by=" + value;
            @endif
            window.location.href = url;
        }
            
    </script>

<script language = "JavaScript">
            google.charts.load('current', {packages: ['corechart', 'bar']});   
    function drawChart() {
       // Define the chart to be drawn.
       var data = google.visualization.arrayToDataTable([
            ['Tháng', 'Doanh thu'],
            @foreach ($lineChart as $item)
                    [{{$item->sale_amount}},{{$item->total}}],
            @endforeach
       ]);

       var options = {title: 'Doanh thu (VND)'}; 

       // Instantiate and draw the chart.
       var chart = new google.visualization.ColumnChart(document.getElementById('container'));
       chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);

</script>
  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Danh mục sách', 'Số lượng bán'],
          @foreach ($listCategoryBestSeller as $item)
                    ['{{$item->category_name}}',{{number_format($item->sale_amount)}}],
            @endforeach
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Danh mục sách', 'Số lượng bán'],
        @foreach ($listProductBestSeller as $item)
                  ['{{$item->product_name}}',{{$item->sale_amount}}],
          @endforeach
      ]);

      var options = {
        title: '',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
      chart.draw(data, options);
    }
  </script>

@endsection
