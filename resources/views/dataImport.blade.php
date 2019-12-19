@extends('welcome')

@section('MainArea')
<?php
    $shop_list=DB::table('shop_list')->select('shop')->get();
?>
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">資料匯入</p>
    <div align="left">
        <form>
            <label for="inp" class="inp">
                <p style="font-size:14px">URL</p>
                <input style="width:100%" type="text" id="inp" placeholder="http://">
                <span class="border"></span>
            </label>
            <label for="inp" class="inp">
                    <p style="font-size:14px">主要關鍵字</p>
                <input type="text" style="width:100%" id="inp">
                <span class="border"></span>
            </label>
            <label for="inp" class="inp">
                    <p style="font-size:14px">次要關鍵字</p>
                <input type="text" style="width:100%" id="inp">
                <span class="border"></span>
            </label>
            <br>
            <select style="width:100%;font-size:20px">
                @foreach ($shop_list as $shop)
                    <option value={{$shop->shop}}>{{$shop->shop}}</option>
                @endforeach
            </select>
        
            <br>
            <br>
            <button style="font-size:14px">送出</button>
        </form>
    </div>
</div>
@endsection