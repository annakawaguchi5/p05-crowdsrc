<h1 id="siteTitle">
	<a href="index.php">学内クラウドソーシング</a>
</h1>

<nav class="navbar navbar-default">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed"
			data-toggle="collapse" data-target="#navbarEexample3">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbarEexample3">

	<?php
	$menu0 = array(  //共通メニュー:未ログイン
	1=> array(
 '仕事を探す'  => 'request.php',
 'ワーカーを探す'  => 'worker_search.php',
	//サイト説明
 '利用ガイド' => 'guide.php'),
	2=>array(
 'ログイン'  => 'login.php')

	);
	$menu = array(
	1 => array(  //ユーザメニュー
 '仕事を探す'  => 'request.php',
 'ワーカーを探す'  => 'worker_search.php',
 '仕事管理' => 'work_management.php',
 'パートナー' => 'partner.php',
 '結果確認'  => 'result.php' ,
	),

	9 => array(  //管理者メニュー
 'アカウント登録'  => 'user_add.php' ,
 'アカウント一覧'  => 'user_list.php' ,
 'アカウント削除'  => 'user_delete.php' ,
 'パスワード変更'  => 'user_passwd.php'
 )
 );

 $menu3 = array(  //共通メニュー:ログイン中
 'ホーム'  => 'index.php',
 'ログアウト'  => 'logout.php',
 );
 // ここはセッションがすでに開始したと仮定する。
 if (isset($_SESSION['post'])){//ログイン中の場合
 	$p = $_SESSION['post']; //ユーザ種別を調べる
 	if($p==1||$p==2||$p==8){
 		$post = 1;
 	}
 	//これから$uroleの値を調べ、値に応じて異なるメニューを出力
 	make_menu($menu[$post], 'left');
 	make_menu($menu3, 'right');
 }else{//未ログインの場合
 	make_menu($menu0[1],'left');
 	make_menu($menu0[2],'right');
 }

 function make_menu($m,$d){
 	echo '<ul class="nav navbar-nav navbar-'.$d.'">';
 	foreach($m as $label=>$url){
 		echo '<li><a href="'.$url.'">'.$label.'</a></li>';
 	}
 	echo '</ul>';
 }

 ?>
	</div>
</div>
</nav>
