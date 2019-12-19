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
            <button style="font-size:12px" onclick="document.getElementById('keyword_input').value='{{$hot_keyword->keywords}}'">{{$hot_keyword->keywords}}</button>
        @endforeach
        <form>
            <button style="height:40px" name="search_keyword" id="search_keyword" onclick="document.getElementById('search_keyword').value=document.getElementById('keyword_input').value">商品明細資訊查詢</button>
        </form>
    </div>
    <table class="paleBlueRows" style="width:100%">
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
                <th>功能</th>
            </tr>
        </thead>
        <tbody style="font-size:14px">
            @foreach($datalists as $datalist)
            <tr>
                <form>
                <td><input name="new_main_keyword" value={{$datalist->main_keyword}}></td>
                <td><input name="new_second_keyword" value={{$datalist->second_keyword}}></td>
                <td><input name="new_product_description" value={{$datalist->product_description}}></td>
                <td><input name="new_price" value={{$datalist->price}}></td>
                <td><input name="new_color" value={{$datalist->color}}></td>
                <td><input name="new_part" value={{$datalist->part}}></td>
                <td><input name="new_thickness" value={{$datalist->thickness}}></td>
                <td><input name="new_size" value={{$datalist->size}}></td>
                <td><input name="new_instruction_for_use" value={{$datalist->instruction_for_use}}></td>
                <td><input name="new_instruction_for_others" value={{$datalist->instruction_for_others}}></td>
                <td>
                    <button name="modify" value="{{$datalist->id}}">修改</button>
                    <button name="delete" value="{{$datalist->id}}">刪除</button>
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection