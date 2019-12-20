@extends('welcome')

@section('MainArea')
<?php
    $titles = DB::table('title')->where('id','=','1')->get();
    $shop_list=DB::table('shop_list')->select('shop')->get();
?>
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">後台管理系統</p>
    <div>
        <form>
            <table style="width:100%;font-size:20px" align="left">
                <tr>
                    <th>標題</th>
                    <td style="text-align:left"><input style="font-size:20px" name="new_title" value={{$titles[0]->title}}></td>
                </tr>
                <tr>
                    <th>商家選項</th>
                    <td style="text-align:left">
                        <select id="shop_select" style="width:200px;font-size:20px" onchange="document.getElementById('shop_name').value=document.getElementById('shop_select').value">
                            @foreach ($shop_list as $shop)
                                <option value={{$shop->shop}}>{{$shop->shop}}</option>
                            @endforeach
                        </select>
                        <input id="shop_name" name="shop_name" type="text" value="">
                        <input type="hidden" value="X">
                        <button name="add_shop" value="1">+</button>
                        <button name="remove_shop" value="1">-</button>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td style="text-align:left"><button style="font-size:20px" name="save" value="1">儲存</button></td>
                </tr>
            </table>
        </form>
    </div>
    
</div>
<script>
    document.getElementById('shop_name').value=document.getElementById('shop_select').value;
</script>
@endsection