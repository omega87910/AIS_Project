@extends('welcome')

@section('MainArea')
<div class="divback"  style="padding:0% 5% 0% 5%;">
    <p style="font-size:32px;font-family:Microsoft JhengHei;font-weight:bold;">商品價格查詢</p>
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
    {{$datalists->links()}}
    <table class="paleBlueRows" style="width:100%;font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;">
            <thead>
                <tr>
                    <th>@sortablelink('main_keyword','主要關鍵字',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                    <th>@sortablelink('second_keyword','次要關鍵字',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                    <th>@sortablelink('price','平均價格',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                </tr>
            </thead>
            <tbody style="font-size:20px;">
                @foreach($datalists as $datalist)
                <tr>
                    <td>{{$datalist->main_keyword}}</td>
                    <td>{{$datalist->second_keyword}}</td>
                    <td>{{$datalist->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$datalists->links()}}
</div>
@endsection
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection