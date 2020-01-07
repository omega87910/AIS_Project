@extends('welcome')

@section('MainArea')

<p style="font-size:32px;font-family:Microsoft JhengHei;font-weight:bold;">資料添加作業</p>
<form>
<div class="row">
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">主要關鍵字：</label>
            <div class="col-md-7">
                <input style="font-size:20px" class="form-control" name="edit_main_keyword" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->main_keyword ;}?> > 
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-md-5 col-form-label text-md-right dataAddLabel">次要關鍵字：</label>

            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_second_keyword" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->second_keyword ;}?> >
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-md-5 col-form-label text-md-right dataAddLabel">產品說明：</label>

            <div class="col-md-7">
                <textarea class="form-control dataAddLabel" name="edit_product_description"><?php if(isset($_GET['edit'])){echo $datalists_edit[0]->product_description;}?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">使用說明：</label>

            <div class="col-md-7">
                <textarea class="form-control dataAddLabel" name="edit_instruction_for_use"><?php if(isset($_GET['edit'])){echo $datalists_edit[0]->instruction_for_use;}?></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">價格：</label>
            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_price" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->price;}?>>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">顏色：</label>

            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_color" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->color;}?>>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">厚度：</label>

            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_thickness" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->thickness;}?>>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">部位：</label>

            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_part" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->part;}?>>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">大小：</label>

            <div class="col-md-7">
                <input class="form-control dataAddLabel" name="edit_size" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->size;}?>>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-md-5 col-form-label text-md-right dataAddLabel">其他說明：</label>

            <div class="col-md-7">
                <textarea style="height:150px" class="form-control dataAddLabel" name="edit_instruction_for_others"><?php if(isset($_GET['edit'])){echo $datalists_edit[0]->instruction_for_others;}?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <button class="addbutton" name="add">新增</button>
                <button class="modbutton" name="modify" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->id;}else{echo "not_found";}?>>更新</button>
                <button class="delbutton" name="delete" value=<?php if(isset($_GET['edit'])){echo $datalists_edit[0]->id;}else{echo "not_found";}?>  onclick="return confirm('你確定要刪除這筆資料嗎？');">刪除</button>
            </div>
        </div>
    </div>
</div>
</form>
<div class="row" style="padding:0px 10px">
    <div class="col-md-12">
    <div style="text-align:left;font-size:20px;font-weight:bold;font-family:Microsoft JhengHei;">
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
    <table class="paleBlueRows" style="width:100%;font-size:20px;">
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
        <tbody style="font-size:20px">
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
    {{$datalists->links()}}
</div>
</div>
@endsection
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection