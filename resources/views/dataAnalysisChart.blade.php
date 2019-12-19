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