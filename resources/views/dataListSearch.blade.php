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
    <p style="font-size:32px">商品明細資訊查詢</p>
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