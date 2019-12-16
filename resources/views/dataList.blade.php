@extends('welcome')

@section('MainArea')

<?php 
$hot_keywords = DB::table('recent_keywords')->select('keywords',DB::raw("COUNT(*)"))->groupby('keywords')->orderby(DB::raw("COUNT(*)"),'desc')->paginate(10);
if (isset($_GET['search_keyword'])){
    $keyword = $_GET['search_keyword'];
    if ($keyword!=""){
        DB::table('recent_keywords')->Insert(
            ['keywords' => $keyword]
        );
        $datalists = DB::table('data_list')->where('main_keyword','LIKE',"%$keyword%")->get();
    }else{
        echo 'keyword is empty';
    }
}
?>
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">資料處理作業</p>
        <div style="text-align:left">
        <p>關鍵字</p>
        <input name="keyword_input" style="width:100%" type="text" id="keyword_input" value="" required>
        <p>熱門關鍵字</p>
        @foreach ($hot_keywords as $hot_keyword)
            <button onclick="document.getElementById('keyword_input').value='{{$hot_keyword->keywords}}'">{{$hot_keyword->keywords}}</button>
        @endforeach
        <form>
            <button style="height:40px" name="search_keyword" id="search_keyword" onclick="document.getElementById('search_keyword').value=document.getElementById('keyword_input').value">商品明細資訊查詢</button>
        </form>
        </div>
    <p style="font-size:32px">商品明細資訊查詢</p>

    
    <table class="paleBlueRows" style="width:100%">
        <thead>
            <tr>
                <th>主要關鍵字</th>
                <th>顏色</th>
                <th>部位</th>
                <th>厚度</th>
                <th>大小</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datalists as $datalist)
            <tr>
                <td>{{$datalist->main_keyword}}</td>
                <td>{{$datalist->color}}</td>
                <td>{{$datalist->part}}</td>
                <td>{{$datalist->thickness}}</td>
                <td>{{$datalist->size}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    <p style="font-size:32px">商品平均價格查詢</p>
    <table class="paleBlueRows" style="width:100%">
            <thead>
                <tr>
                    <th>主要關鍵字</th>
                    <th>次要關鍵字</th>
                    <th>平均價格</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datalists as $datalist)
                <tr>
                    <td>{{$datalist->main_keyword}}</td>
                    <td>{{$datalist->second_keyword}}</td>
                    <td>{{$datalist->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <p style="font-size:32px">商品資料分析圖</p>
    <?php 
        $label_array = array();
        $price_array = array();
        foreach($datalists as $datalist){
            $label_array[] = $datalist->main_keyword;
            $price_array[] = $datalist->price;
        }
        $chart->labels($label_array);//商品種類陣列
        $chart->dataset('Price', 'bar', $price_array)->backgroundColor('#C7D6EA');//商品價格陣列
    ?>
    <div>
        {!! $chart->container() !!}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        {!! $chart->script() !!}
    </div>
</div>
@endsection