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
        <div id = "head">
        <h1 class= "users"><a href="/top" ><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>〇〇さん<a href="/profile" ><img src="images/icon1.png"></p>
                <div>
<a></a>
<button type="button" class="menu-btn">
  <span class="inn"></span>
</button>


              <ul>
	<li class="block">
		<input type="checkbox" name="item" id="item1" />
		<label for="item1"><i aria-hidden="true" class="icon-users"></i> Friends </label>
		<ul class="options">
			<li><a href="/top"><i aria-hidden="true" class="icon-search"></i> HOME</a></li>
			<li><a href="/profile"><i aria-hidden="true" class="icon-point-right"></i> プロフィール編集</a></li>
			<li><a href="/logout"><i aria-hidden="true" class="icon-fire"></i>ログアウト</a></li>
		</ul>
	</li>

            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
