<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

$requestid = $_GET['requestid'];
$where = 'WHERE requestid="'.$requestid.'"';
$sql = 'SELECT * FROM tb_request NATURAL JOIN tb_user '.$where;	//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;

$sdate=$row['sdate'];
$edate=$row['edate'];
$contents=$row['contents'];
$requserid=$row['requserid'];
$uname=$row['uname'];
?>

<div class="container">

	<!-- 9列を割り当て 詳細情報 -->


	<div class="col-xs-9">
		<div class="row">
			<!-- タイトル -->
		<?php
		echo '<h1>'.$row['rname'].'</h1>';
		?>



			<div class="row">
				<div class="col-xs-3">
					<div class="panel panel-info">
						<div class="panel-heading">報酬</div>
						<div class="panel-body">
						<?php
						echo $row['point'].'ポイント';
						?>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="panel panel-info">
						<div class="panel-heading">募集人数</div>
						<div class="panel-body">
						<?php
						$perficient = $row['perficient'];
						echo $perficient.'人';
						?>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="panel panel-info">
						<div class="panel-heading">応募人数</div>
						<div class="panel-body">
						<?php
						$sql = 'SELECT COUNT(*) FROM tb_receive '.$where;	//検索条件を適用したSQL文を作成
						$rs = mysql_query($sql, $conn);
						if (!$rs) die ('エラー: ' . mysql_error());
						$row = mysql_fetch_array($rs) ;
						//保留, SQL発動
						$apply = $row['COUNT(*)'];
						echo $apply.'人';
						//echo '人';
						?>
						</div>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="panel panel-info">
						<div class="panel-heading">残り人数</div>
						<div class="panel-body">
						<?php
						//保留, SQL発動
						//echo $row['point'].'人';
						$rest=$perficient-$apply;
						echo $rest.'人';
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
				<?php
				echo '依頼方式：<br>';//+SQL
				echo 'カテゴリ：<br>';//+SQL
				?>
				</div>
				<div class="col-xs-6">
				<?php
				echo '募集開始日：'.$sdate.'<br>';
				echo '募集締切日：'.$edate.'<br>';
				echo '希望納品日：<br>';
				?>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-info">
					<div class="panel-heading">仕事内容・概要</div>
					<div class="panel-body">
					<?php
					echo $contents;

					?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 3列を割り当て クライアント情報・連絡 -->
	<div class="col-xs-3">
		<div class="panel panel-info">
			<div class="panel-heading">クライアント情報</div>
			<div class="panel-body">
			<?php
			echo '画像<br>';
			echo $requserid.'<br>'.$uname.'<br>';
			echo '文系or理系|';
			echo '学部<br>';
			?>
			</div>
		</div>
	</div>
</div>




			<?php
			include('page_footer.php');
			?>