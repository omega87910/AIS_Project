<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>德成皮革股份有限公司(day 5)</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color:antiquewhite;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

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
                /* width: 100%; */
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
            table.paleBlueRows {
                font-family: "Times New Roman", Times, serif;
                border: 1px solid #FFFFFF;
                text-align: center;
                border-collapse: collapse;
            }
            table.paleBlueRows td, table.paleBlueRows th {
                border: 1px solid #FFFFFF;
                padding: 3px 2px;
            }
            table.paleBlueRows tbody td {
                font-size: 13px;
            }
            table.paleBlueRows tr:nth-child(even) {
                background: #D0E4F5;
            }
            table.paleBlueRows thead {
                background: #0B6FA4;
                border-bottom: 5px solid #FFFFFF;
            }
            table.paleBlueRows thead th {
                font-size: 17px;
                font-weight: bold;
                color: #FFFFFF;
                text-align: center;
                border-left: 2px solid #FFFFFF;
            }
            table.paleBlueRows thead th:first-child {
                border-left: none;
            }
            table.paleBlueRows {
                font-size: 14px;
                font-weight: bold;
                color: #333333;
                background: #D0E4F5;
                border-top: 3px solid #444444;
            }
            table.paleBlueRows td {
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="flex-top position-ref full-height">
            @if (Route::has('login')) <!-- 如果登入了 -->
                <div class="top-right links">
                    @auth <!-- 驗證成功 -->
                        <a>使用者名稱：{{ Auth::user()->name }}</a>
                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @else <!-- 驗證失敗 -->
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    資料分析與處理系統
                </div>

                <div class="links">
                    <a href="{{'dataImport'}}">資料匯入</a>
                    <a href="{{'dataList'}}">資料處理作業</a>
                    <a href="#">大數據資料分析</a>
                    <a href="#">產業分析智慧儀表板</a>
                    <a href="#">後台管理系統</a>
                </div>
                
                <div>
                    @yield('MainArea')
                </div>
            </div>
        </div>
    </body>
</html>
