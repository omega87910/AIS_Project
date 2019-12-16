<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>德成皮革股份有限公司(day 6.5)</title>

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
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
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
                    <a href="{{'dataAnalysis'}}">大數據資料分析</a>
                    <a href="{{'dataDashboard'}}">產業分析智慧儀表板</a>
                    <a href="{{'dataManage'}}">後台管理系統</a>
                </div>
                
                <div>
                    @yield('MainArea')
                </div>
            </div>
        </div>
    </body>
</html>
