@extends('welcome')

@section('MainArea')
<div style="padding:0% 5% 0% 5%;">
    <p style="font-size:32px;font-family:Microsoft JhengHei;font-weight:bold;">商品資料分析圖</p>
    <div style="text-align:left;font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;">
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
            <div class="custom-control custom-radio" style="display:inline;font-size:22px;">
                <input type="radio" class="custom-control-input" id="defaultChecked" name="search_which" value="main" checked>
                <label class="custom-control-label" for="defaultChecked">主要</label>
            </div>
            <div class="custom-control custom-radio" style="display:inline;font-size:22px;">
                <input type="radio" class="custom-control-input" id="defaultUnchecked" name="search_which" value="second">
                <label class="custom-control-label" for="defaultUnchecked">次要</label>
            </div>
            <br>
            <button class="btn btn-primary" style="font-size:20px;height:60px" name="search_bool" value="1">商品明細資訊查詢</button>
            <button class="btn btn-danger" style="font-size:20px;height:60px" name="clear_bool" value="1">清除關鍵字</button>

        </form>
    </div>
    <?php 
        $label_array = array();
        $price_array = array();
        $color_array = array();
        $times_array = array();
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        foreach($datalists as $datalist){
            if(array_key_exists($datalist->main_keyword,$label_array)){//若陣列已經儲存該label
                $label_array[$datalist->main_keyword] += $datalist->price;
                $times_array[$datalist->main_keyword] += 1;
            }else{
                $label_array[$datalist->main_keyword] = $datalist->price;
                $times_array[$datalist->main_keyword] = 1;
            }
        }
        $value_array = array_values($label_array);
        $times_array = array_values($times_array);
        for($i=0;$i<count($value_array);$i++){
            $avg_array[] = $value_array[$i] / $times_array[$i];
        }
        for($i=0;$i<count($label_array);$i++){
            $color_array[] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
        }
        
        $chart->labels(array_keys($label_array));//商品種類陣列
        $chart->dataset('price', 'bar', $avg_array)->backgroundColor($color_array);//商品價格陣列
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