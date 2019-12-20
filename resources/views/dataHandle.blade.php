@extends('welcome')

@section('MainArea')

<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">資料處理作業</p>
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
                    echo "<button name='remove_keyword' value=$item>$item</button>";
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
                    <td><input style="width:60px" name="new_main_keyword" value={{$datalist->main_keyword}}></td>
                    <td><input style="width:60px" name="new_second_keyword" value={{$datalist->second_keyword}}></td>
                    <td><input style="width:60px" name="new_product_description" value={{$datalist->product_description}}></td>
                    <td><input style="width:60px" name="new_price" value={{$datalist->price}}></td>
                    <td><input style="width:60px" name="new_color" value={{$datalist->color}}></td>
                    <td><input style="width:60px" name="new_part" value={{$datalist->part}}></td>
                    <td><input style="width:60px" name="new_thickness" value={{$datalist->thickness}}></td>
                    <td><input style="width:60px" name="new_size" value={{$datalist->size}}></td>
                    <td><input style="width:60px" name="new_instruction_for_use" value={{$datalist->instruction_for_use}}></td>
                    <td><input style="width:60px" name="new_instruction_for_others" value={{$datalist->instruction_for_others}}></td>
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