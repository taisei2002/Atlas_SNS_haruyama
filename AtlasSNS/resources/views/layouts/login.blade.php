<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
     <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="images/icon1.png" sizes="16x16" type="image/png" />
    <link rel="icon" href="images/icon1.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="images/icon1.png" sizes="48x48" type="image/png" />
    <link rel="icon" href="images/icon1.png" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="images/icon1.png" />
    <!--OGPタグ/twitterカード-->
</head>
<body>

<header>

<div class = "head">
      <div class = "Atlas_icon">

  <a href="/top" ><img src="{{ asset('images/atlas.png') }}" widht="40" height="40"></a></div>
      <div class ="User_icon" href="/profile" >



        <ul class="accordion-menu">

            <div id="accordion" class="accordion-container">

         <li>
            <div class="accordion-title js-accordion-title"><i class="" aria-hidden="true"></i>
                 <i class="" aria-hidden="true"></i>
                     <p class ="font-color-white">{{ Auth::user()->username }}さん</p>
                        <img src="{{ asset('/storage/images/'.Auth::user()->images) }}" class="rounded-circle" width="60" height="60">
       </div>

           <ul class="submenuItems">
               <li><a href="/top"><i aria-hidden="true" class="icon-search"></i> HOME</a></li>
               <li><a href="/profile"><i aria-hidden="true" class="icon-point-right"></i> プロフィール編集</a></li>
	           <li><a href="/logout"><i aria-hidden="true" class="icon-fire"></i>ログアウト</a></li>
          </ul>
          </li>
        </ul>
         </div>
      </div>
      </div>
</div>

    </header>


    <div id="row">

        <div id="container">
            @yield('content')
        </div >

        <div id="side-bar">

             <div id="confirm">
                <br>
                <p >　{{ Auth::user()->username }}さんの</p>
                　フォロー数
                <p class = "follows-count">{{ Auth::user()->follows()->get()->count() }}人</p>

        <div class = "follow-list-btn-position">
            <div class="follow-list-btn">
                <a style="color:white" href="/follow-list">フォローリスト</a>
            </div>
        </div>
              　フォロワー数
                <p class = "follows-count">{{ Auth::user()->followUsers()->get()->count() }}人</p>
        <div class = "follow-list-btn-position">
            <div class="follow-list-btn">
                <a style="color:white" href="/follower-list">フォロワーリスト</a>
            </div>
        </div>
  <br>
    <h1 class =  "follow_border"></h1>
   <br></br>
            <div class="search-btn">
               <a style="color:white" href="/search">ユーザー検索</a>
            </div>
</div>
<div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
