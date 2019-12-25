@extends('welcome')

@section('MainArea')

<p style="font-size:32px">資料添加作業</p>
<div class="row">
    <div class="col-md-4">
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">主要關鍵字：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="edit_main_keyword" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">次要關鍵字：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">產品說明：</label>

            <div class="col-md-7">
                <textarea style="font-size:16px" class="form-control" name="" value=""></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">使用說明：</label>

            <div class="col-md-7">
                <textarea style="font-size:16px" class="form-control" name="" value=""></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">價格：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">顏色：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">厚度：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">部位：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">大小：</label>

            <div class="col-md-7">
                <input style="font-size:16px" class="form-control" name="" value="">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label style="font-size:16px" class="col-md-5 col-form-label text-md-right">其他說明：</label>

            <div class="col-md-7">
                <textarea style="font-size:16px;height:150px" class="form-control" name="" value=""></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <button class="addbutton">新增</button>
                <button class="modbutton">更新</button>
                <button class="delbutton">刪除</button>
            </div>
        </div>
    </div>
</div>
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
                <th>功能</th>
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
        <tbody style="font-size:14px">
            @foreach($datalists as $datalist)
            <tr>
                <form>
                    <td>
                        <button name="edit" value="{{$datalist->id}}">選取</button>
                        {{-- <button class="modbutton" name="modify" value="{{$datalist->id}}">修改</button>
                        <button class="delbutton" name="delete" value="{{$datalist->id}}">刪除</button> --}}
                    </td>
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
                    {{-- <td>
                        <button>選取</button>
                        {{-- <button class="modbutton" name="modify" value="{{$datalist->id}}">修改</button>
                        <button class="delbutton" name="delete" value="{{$datalist->id}}">刪除</button> --}}
                    {{-- </td> --}}
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection