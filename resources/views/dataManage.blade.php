@extends('welcome')

@section('MainArea')
<?php
    $titles = DB::table('title')->where('id','=','1')->get();
    $shop_list=DB::table('shop_list')->select('shop')->get();
?>
<div style="padding:0% 25% 0% 25%">
    <p style="font-size:32px">後台管理系統</p>
    <div>
        <form  onkeydown="return event.key != 'Enter';">
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
                        </select><br>
                        <input  style="font-size:20px" id="shop_name" name="shop_name" type="text" value=""><br>
                        <button class="addbutton" style="font-size:20px" name="add_shop" value="1">新增商家</button>
                        <button class="delbutton" style="font-size:20px" name="remove_shop" value="1" onclick="return confirm('你確定要刪除這筆資料嗎？');">移除商家</button>
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
@section('failed')
    <p style="font-size:32px">請登入後再使用</p>   
    <div class="container">
        <h2>Modal Example</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open Modal</button>
          <form method="post" action="{{url('chempionleague')}}" id="form">
              @csrf
        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="alert alert-danger"  style="display:none"></div>
            <div class="modal-header">
                
              <h5 class="modal-title">Uefa Champion League</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="form-group col-md-4">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                      <label for="Club">Club:</label>
                      <input type="text" class="form-control" name="club" id="club">
                    </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-4">
                      <label for="Country">Country:</label>
                      <input type="text" class="form-control" name="country" id="country">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="Goal Score">Goal Score:</label>
                    <input type="text" class="form-control" name="score" id="score">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
              </div>
          </div>
        </div>
      </div>
        </form>
      </div>
@endsection