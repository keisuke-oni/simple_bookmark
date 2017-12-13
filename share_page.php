<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>共有ページ | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > <a href="./u_page.php">ユーザページ</a> > 共有ページ <br />
	<div align="center">
		<h1>共有ページ</h1>
		<?php
		if($_SESSION["id"] != ""){
			$user_id = $_SESSION["id"];
			print "こんにちわ。{$user_id}さん。<br /> \n";
		?>
		<form action="share_page.php" method="post">
			タイトル：<input type="text" name="title" />
			URL：<input type="text" name="url" />
			<input type ="submit" value="追加" />
		</form>
		<?php
		if($_POST["title"] != ""){
			$title = $_POST["title"];
			$url = $_POST["url"];
			share_url_add($title, $url, $user_id);
		}
			share_url_show();
		?>
		<br />
		<a href="./u_page.php">ユーザページに戻る</a>
		<?php
		}else{
			print "セッションタイムアウトです。<br /> \n";
			print "HOMEからログインしてください。<br /> \n";
			print "<a href=\"./index.php\">HOMEヘ戻る</a> \n";
			session_destroy();
		}
		footer();
		?>
	</div>
</body>
</html>