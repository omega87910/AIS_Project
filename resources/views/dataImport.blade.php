@extends('welcome')

@section('MainArea')
<?php
    $shop_list=DB::table('shop_list')->select('shop')->get();
?>
<div style="padding:0% 20% 0% 20%">
    <p style="font-size:32px;font-family:Microsoft JhengHei;font-weight:bold;">資料匯入</p>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="col-md-2 col-form-label text-md-right">Web Url:</label>
                <div class="col-md-10">
                    <input style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="form-control" name="edit_main_keyword" value="" > 
                </div>
            </div>
            <div class="form-group row">
                <label style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="col-md-2 col-form-label text-md-right">主要關鍵字:</label>
                <div class="col-md-4">
                    <input style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="form-control" name="edit_main_keyword" value="" > 
                </div>
                <label style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="col-md-2 col-form-label text-md-right">次要關鍵字:</label>
                <div class="col-md-4">
                    <input style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="form-control" name="edit_main_keyword" value="" > 
                </div>
            </div>
            <div class="form-group row">
                <label style="font-size:20px;font-family:Microsoft JhengHei;font-weight:bold;" class="col-md-2 col-form-label text-md-right">商家選項:</label>
                <div class="col-md-10">
                <select style="width:100%;font-size:20px">
                    @foreach ($shop_list as $shop)
                        <option value={{$shop->shop}}>{{$shop->shop}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" style="font-size:20px;width:150px;height:50px">送出</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div align="left">
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
    </div> --}}
</div>
@endsection
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
@endsection