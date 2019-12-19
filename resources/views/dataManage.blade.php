@extends('welcome')

@section('MainArea')
<?php
    $titles = DB::table('title')->where('id','=','1')->get();
?>
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">後台管理系統</p>
    <div>
        <form>
           標題：<input name="new_title" value={{$titles[0]->title}}>
           <button name="save" value="1">儲存</button>
        </form>
    </div>
    
</div>
@endsection