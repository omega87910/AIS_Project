@extends('welcome')

@section('MainArea')
<div style="padding:0% 5% 0% 5%;">
    <p style="font-size:32px">商品資料分析圖</p>
    <div style="text-align:left;font-size:20px;">
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
            <button class="btn btn-primary" style="font-size:20px;height:60px" name="search_bool" value="1">商品明細資訊查詢</button>
            <button class="btn btn-danger" style="font-size:20px;height:60px" name="clear_bool" value="1">清除關鍵字</button>

        </form>
    </div>
    <?php 
        $label_array = array();
        $price_array = array();
        $color_array = array();
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        foreach($datalists as $datalist){
            $label_array[] = $datalist->main_keyword;
            $price_array[] = $datalist->price;
        }
        for($i=0;$i<count($label_array);$i++){
            $color_array[] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
        }
        $chart->labels($label_array);//商品種類陣列
        $chart->dataset('price', 'bar', $price_array)->backgroundColor($color_array);//商品價格陣列
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