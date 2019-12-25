@extends('welcome')

@section('MainArea')
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">商品資料分析圖</p>
    <div style="text-align:left">
        <p>關鍵字</p>
        <form>
            <input name="keyword_input" style="width:100%" type="text" id="keyword_input" value="" required>
        </form>
        <p>搜尋關鍵字</p>
        <form>
            <?php
             if (isset($_SESSION['keyword_array'])){ 
                foreach($_SESSION['keyword_array'] as $item){
                    echo "<button class='keybutton' name='remove_keyword' value=$item>$item</button>";
                }
            }
            ?>
        </form>
        <form>
            <button style="font-size:20px;height:60px" name="search_bool" value="1">商品明細資訊查詢</button>
        </form>
    </div>
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
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection