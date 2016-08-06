<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
echo "<h2>ワーク登録画面</h2>";
?>

<!-- SQL発動 worker_search.phpの入力データを表示 -->
<!-- form groupは追々まとめる -->
<div class="container-fluid bg-info">
	<form action="worker_search_f.php" class="form-horizontal"
		method="post">
		<div class="form-group">
			<label for="requestid" class="control-label col-sm-2">仕事方式：</label>
			<div class="col-sm-10">
				<div class="radio-inline">
					<input type="radio" name="method" value="1">プロジェクト
				</div>
				<div class="radio-inline">
					<input type="radio" name="method" value="2">タスク
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="contents" class="control-label col-sm-2">募集締切日：</label>
			<div class="col-sm-8">
				<input type="text" name="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="contents" class="control-label col-sm-2">希望納品日：</label>
			<div class="col-sm-8">
				<input type="text" name="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="contents" class="control-label col-sm-2">報酬：</label>
			<div class="col-sm-8">
				<input type="text" name="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="contents" class="control-label col-sm-2">達成予定人数：</label>
			<div class="col-sm-8">
				<input type="text" name="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="point" class="control-label col-sm-2">ポイント分配方法:</label>
			<div class="col-sm-8">
				<select name="urole" class="form-control">
					<option value="1">分配
					<option value="2">全額
					<option value="3">順位付け配布
				</select>
			</div>
		</div>
</div>

<button class="col-xs-offset-2 btn btn-danger" type="submit">登録</button>
<button class="btn btn-default" type="reset">取消</button>

</form>
</div>

<?php
include('page_footer.php');
?>
