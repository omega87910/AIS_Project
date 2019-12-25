<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>德成皮革股份有限公司(day 11)</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" type="text/css" rel="stylesheet">
        <!-- Styles -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
        </script>
      <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>


  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/chempionleague') }}",
                  method: 'post',
                  data: {
                     name: jQuery('#name').val(),
                     club: jQuery('#club').val(),
                     country: jQuery('#country').val(),
                     score: jQuery('#score').val(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#open').hide();
                  		$('#myModal').modal('hide');
                  	}
                  }});
               });
            });
      </script>
        <style>
            .modal-backdrop{
                opacity: 0.5;
            }
            html, body {
                /* background-color:honeydew; */
                background-color:aliceblue;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color:#bfffff;
                font-size: 64px;
                background-color:#13aeab;
            }
            .navTop > a {
                color:#bfffff;
                /* color: #636b6f; */
                padding: 0px 10px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links > a {
                color: white;
                padding: 0px 10px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links > a:hover{
                color: black;
                background-color: snow;
            }
            .navTop > a:hover{
                background-color:#223254;
            }
            /* .m-b-md {
                margin-bottom: 30px;
            } */

            .label{
                position: absolute;
                /* top: 16px; */
                left: 0;
                font-size: 16px;
                color: #9098A9;
                font-weight: 500;
                transform-origin: 0 0;
                transition: all .2s ease;
            }
            .border{
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                width: 100%;
                background #0077FF;
                transform: scaleX(0);
                transform-origin: 0 0;
                transition: all .15s ease;
            }
            .inp{
                position: relative;
                margin: auto;
                /* width: 100%; */
                /* max-width: 280px; */
            }
            input{
                -webkit-appearance: none;
                /* width: 10%; */
                border: 0;
                font-family: inherit;
                /* padding: 12px 0; */
                /* height: 48px; */
                font-size: 16px;
                font-weight: 500;
                border-bottom: 2px solid #C8CCD4;
                background: none;
                border-radius: 0;
                color: #223254;
                transition: all .15s ease;
            }
            input:hover{
                  background: rgba(#223254,.03);
            }
            input:not(:placeholder-shown)+span{
                color #5A667F;
                transform: translateY(-26px) scale(.75);
            }
            input:focus+span+.border{
                background: none;
                outline: none;
                color #0077FF;
                transform: translateY(-26px) scale(.75);
                transform: scaleX(1);
            }
            .form-inline {
                display: flex;
                flex-flow: row wrap;
                align-items: center;
            }
            table
        {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }
        table td, table th
        {
            border: 1px solid #cad9ea;
            color: #666;
            height: 30px;
        }
        table thead th
        {
            background-color: #CCE8EB;
            width: 100px;
        }
        th
        {
            background-color: #CCE8EB;
            width: 100px;
        }
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
        }
        .mytable{
            color: #636b6f;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .delbutton {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            /* padding: 12px 24px; */
            border: 1px solid #a12727;
            border-radius: 8px;
            background: #ff4a4a;
            background: -webkit-gradient(linear, left top, left bottom, from(#ff4a4a), to(#992727));
            background: -moz-linear-gradient(top, #ff4a4a, #992727);
            background: linear-gradient(to bottom, #ff4a4a, #992727);
            -webkit-box-shadow: #ff5959 0px 0px 0px 0px;
            -moz-box-shadow: #ff5959 0px 0px 0px 0px;
            box-shadow: #ff5959 0px 0px 0px 0px;
            text-shadow: #591717 1px 1px 7px;
            font: normal normal bold 20px arial;
            color: #ffffff;
            text-decoration: none;
        }
        .delbutton:hover,
        .delbutton:focus {
            background: #ff5959;
            background: -webkit-gradient(linear, left top, left bottom, from(#ff5959), to(#b62f2f));
            background: -moz-linear-gradient(top, #ff5959, #b62f2f);
            background: linear-gradient(to bottom, #ff5959, #b62f2f);
            color: #ffffff;
            text-decoration: none;
        }
        .delbutton:active {
            background: #982727;
            background: -webkit-gradient(linear, left top, left bottom, from(#982727), to(#982727));
            background: -moz-linear-gradient(top, #982727, #982727);
            background: linear-gradient(to bottom, #982727, #982727);
        }
        .addbutton {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            /* padding: 12px 24px; */
            border: 1px solid #197a32;
            border-radius: 8px;
            background: #2ee55e;
            background: -webkit-gradient(linear, left top, left bottom, from(#2ee55e), to(#197a32));
            background: -moz-linear-gradient(top, #2ee55e, #197a32);
            background: linear-gradient(to bottom, #2ee55e, #197a32);
            -webkit-box-shadow: #37ff71 0px 0px 0px 0px;
            -moz-box-shadow: #37ff71 0px 0px 0px 0px;
            box-shadow: #37ff71 0px 0px 0px 0px;
            text-shadow: #0f481e 1px 1px 7px;
            font: normal normal bold 20px arial;
            color: #ffffff;
            text-decoration: none;
        }       
        .addbutton:hover,
        .addbutton:focus {
            border: 1px solid #1d8f3b;
            background: #37ff71;
            background: -webkit-gradient(linear, left top, left bottom, from(#37ff71), to(#1e923c));
            background: -moz-linear-gradient(top, #37ff71, #1e923c);
            background: linear-gradient(to bottom, #37ff71, #1e923c);
            color: #ffffff;
            text-decoration: none;
        }
        .addbutton:active {
            background: #197a32;
            background: -webkit-gradient(linear, left top, left bottom, from(#197a32), to(#197a32));
            background: -moz-linear-gradient(top, #197a32, #197a32);
            background: linear-gradient(to bottom, #197a32, #197a32);
        }
        .modbutton {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            /* padding: 12px 24px; */
            border: 1px solid #a8ad26;
            border-radius: 8px;
            background: #f2fa19;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2fa19), to(#a3981f));
            background: -moz-linear-gradient(top, #f2fa19, #a3981f);
            background: linear-gradient(to bottom, #f2fa19, #a3981f);
            -webkit-box-shadow: #37ff71 0px 0px 0px 0px;
            -moz-box-shadow: #37ff71 0px 0px 0px 0px;
            box-shadow: #37ff71 0px 0px 0px 0px;
            text-shadow: #0f481e 1px 1px 7px;
            font: normal normal bold 20px arial;
            color: #ffffff;
            text-decoration: none;
        }
        .modbutton:hover,
        .modbutton:focus {
            border: 1px solid #c1c72c;
            background: #ffff1e;
            background: -webkit-gradient(linear, left top, left bottom, from(#ffff1e), to(#c4b625));
            background: -moz-linear-gradient(top, #ffff1e, #c4b625);
            background: linear-gradient(to bottom, #ffff1e, #c4b625);
            color: #ffffff;
            text-decoration: none;
        }
        .modbutton:active {
            background: #91960f;
            background: -webkit-gradient(linear, left top, left bottom, from(#91960f), to(#a3981f));
            background: -moz-linear-gradient(top, #91960f, #a3981f);
            background: linear-gradient(to bottom, #91960f, #a3981f);
        }
        </style>
    </head>
    <body>
        <div class="flex-top position-ref full-height">
            @if (Route::has('login')) <!-- 如果登入了 -->
                <div class="top-right links">
                    @auth <!-- 驗證成功 -->
                        <p style="color: white;" class="fa fa-user">使用者名稱：{{ Auth::user()->name }}</p>
                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                        <a class="dropdown-item fa fa-sign-out-alt" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @else <!-- 驗證失敗 -->
                        <a class="fa fa-sign-in-alt" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="fa fa-user-plus" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <?php
                        $titles = DB::table('title')->where('id','=','1')->get();
                    ?>
                    {{$titles[0]->title}}
                </div>
                <div class="navTop" style="background-color:#117E96;">
                    <a href="{{'dataImport'}}">資料匯入</a>
                    <a href="{{'dataAdd'}}">資料添加</a>
                    <a href="{{'dataHandle'}}">資料處理作業</a>
                    <a href="{{'dataListSearch'}}">商品明細資訊查詢</a>
                    <a href="{{'dataPriceSearch'}}">商品價格查詢</a>
                    <a href="{{'dataAnalysisChart'}}">商品資料分析圖</a>
                    <a href="{{'bigDataAnalysis'}}">大數據資料分析</a>
                    <a href="{{'dataDashboard'}}">產業分析智慧儀表板</a>
                    <a href="{{'dataManage'}}">後台管理系統</a>
                </div>
                <div>
                    @if (Route::has('login')) <!-- 如果登入了 -->
                        @auth <!-- 驗證成功 -->
                            @yield('MainArea')
                        @else <!-- 驗證失敗 -->
                            @yield('failed')       
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>