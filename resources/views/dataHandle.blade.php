@extends('welcome')

@section('MainArea')

<div style="padding:0% 5% 0% 5%">
    <p style="font-size:32px;font-family:Microsoft JhengHei;font-weight:bold;">資料多重搜尋作業</p>
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
                <th>@sortablelink('product_description','產品說明',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('price','價格',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('color','顏色',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('part','部位',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('thickness','厚度',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('size','大小',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('instruction_for_use','使用方法',[],['class' => 'mytable','rel' => 'nofollow'])</th>
                <th>@sortablelink('instruction_for_others','其他說明',[],['class' => 'mytable','rel' => 'nofollow'])</th>
            </tr>
        </thead>
        <tbody style="font-size:20px">
            @foreach($datalists as $datalist)
            <tr>
                <form>
                    <td>{{$datalist->main_keyword}}</td>
                    <td>{{$datalist->second_keyword}}</td>
                    <td>{{$datalist->product_description}}</td>
                    <td>{{$datalist->price}}</td>
                    <td>{{$datalist->color}}</td>
                    <td>{{$datalist->part}}</td>
                    <td>{{$datalist->thickness}}</td>
                    <td>{{$datalist->size}}</td>
                    <td>{{$datalist->instruction_for_use}}</td>
                    <td>{{$datalist->instruction_for_others}}</td>
                </form>
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