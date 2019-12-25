@extends('welcome')

@section('MainArea')
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">商品明細資訊查詢</p>
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
    <table class="paleBlueRows" style="width:100%">
        <thead>
            <tr>
                <th>@sortablelink('main_keyword','主要關鍵字',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('color','顏色',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('part','部位',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('thickness','厚度',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('size','大小',[],['class' => 'mytable','rel' => 'nofollow'])</th>
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
</div>
@endsection
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection