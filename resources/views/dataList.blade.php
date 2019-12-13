@extends('welcome')

@section('MainArea')

<?php 
$hot_keywords = DB::table('recent_keywords')->select('keywords',DB::raw("COUNT(*)"))->groupby('keywords')->orderby(DB::raw("COUNT(*)"),'desc')->paginate(5);

if (isset($_GET['search_bool'])){
    $search_bool=$_GET['search_bool'];
}else{
    $search_bool=0;
}
if ($search_bool!=0){
    if (isset($_GET['keyword_input'])){
        $keyword = $_GET['keyword_input'];
        DB::table('recent_keywords')->Insert(
            ['keywords' => $keyword]
        );
        $datalists = DB::table('data_list')->where('main_keyword','LIKE',"%$keyword%")->get();
    }else{
        echo "keyword is empty";
    }
}
?>
<div style="padding:0% 25% 0% 25%">
    <form align="left">
        <p>關鍵字</p>
        <input name="keyword_input" style="width:100%" type="text" id="inp" value="<?php if (!empty($_GET['keyword_select'])){echo $_GET['keyword_select'] ;}?>">
        <p>熱門關鍵字</p>
        @foreach ($hot_keywords as $hot_keyword)
            <button name="keyword_select" value="{{$hot_keyword->keywords}}">{{$hot_keyword->keywords}}</button>
        @endforeach
        <br>
        <br>
        <button style="height:40px" name="search_bool" value="1">商品明細資訊查詢</button>
    </form>
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
    {!! $chart->container() !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    {!! $chart->script() !!}
    
</div>
@endsection
{{-- SELECT keywords, COUNT(*)
FROM recent_keywords
GROUP BY keywords
ORDER BY COUNT(*) DESC --}}