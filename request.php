<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

$category = array(1=>'デジタルワーク', 2=>'フィジカルワーク');
$method = array(1=>'プロジェクト', 2=>'タスク');
?>

	<div class="container">
		<div class="row">

			<!-- 4列をサイドメニューに割り当て -->
			<div class="col-xs-4">
			<div class="panel panel-info">
				<div class="panel-heading">検索・絞り込み</div>
				<div class="panel-body">
					<form class="navbar-form" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="検索キーワード">
							<button type="submit" class="btn btn-default">検索</button>
						</div>
					</form>
				</div>

				<div class="panel-heading">仕事ジャンル</div>
				<div class="list-group">
					<a class="list-group-item" href="request.php?genre=1">デジタル</a> <a
						class="list-group-item" href="request.php?genre=2">フィジカル</a>
				</div>
				<div class="panel-heading">仕事タイプ</div>
				<div class="list-group">
					<a class="list-group-item" href="request.php?genre=4">プロジェクト</a> <a
						class="list-group-item" href="request.php?genre=5">タスク</a>
				</div>
			</div>
		</div>

			<!-- 残り8列はコンテンツ表示部分として使う -->
			<!-- SQLを追加/ループで使用-->
<?php
if(isset($_GET['genre'])){
	$genre = $_GET['genre'];
	//2. $cidを使ってSQL文のWHERE句を作成
	$where = "WHERE genre = {$genre}";
	$sql = "select * from tb_request ".$where;//検索条件を適用したSQL文を作成
}else{
	$where = 'WHERE 1';
	$sql = "select * from tb_request ".$where;//検索条件を適用したSQL文を作成
}// 条件なしSQLのWHERE部分を作る
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$now = time();
?>


			<!-- 表示 -->
<?php
echo '<div class="col-xs-8">';
while($row){
	//$remtime = $row['etime']-$now;
				echo '<a href=detail.php?requestid='.$row['requestid'].'>';
				echo '<div class="panel panel-info">
					<div class="panel-heading">';


					echo '<div class="panel-title">'.$row['rname'].'</div>';

					echo '</div>
					<div class="panel-body">';

						echo '<div class="col-xs-3">'.$row['genre'].'</div>';
						echo '<div class="col-xs-3">'.$row['point'].'ポイント</div>';
						echo '<div class="col-xs-3">'.$row['perficient'].'名</div>';
						//echo '<div class="col-xs-3">あと'.$remtime.'日</div>';
						echo '</div></div></a>';
						$row = mysql_fetch_array($rs) ;
					}
?>


				<nav>
					<ul class="pagination pagination-sm">
						<li><a href="#" aria-label="前のページへ"> <span aria-hidden="true">«</span>
						</a>
						</li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#" aria-label="次のページへ"> <span aria-hidden="true">»</span>
						</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	?>


	<?php
	include('page_footer.php');
		?>