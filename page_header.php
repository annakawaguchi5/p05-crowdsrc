<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>学内クラウドソーシング</title>
<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
	rel="stylesheet">
<link href="css/smoke.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .ui-datepicker-trigger {
        width: 30px;
        height: 30px;
        margin: 0 0 0 10px;
        }
    </style>
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/javascript.js"></script>
    <!-- jQuery-UI -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <!-- jQuery-UI-datepicker -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
<script>
  $(function() {
    $("#datepicker").datepicker();
  });
</script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php
/////////////////////////
include('menu.php'); //メニューバーを読み込む
////////////////////////
?>