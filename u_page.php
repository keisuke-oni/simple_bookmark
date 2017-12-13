<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ユーザページ | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > ユーザページ <br />
	<div align="center">
		<h1>ユーザページ</h1>
		<?php
		if($_SESSION["id"] != ""){
			$user_id = $_SESSION["id"];
			print "こんにちわ。{$user_id}さん。<br /> \n";
		?>
		<form action="u_page.php" method="post">
			タイトル：<input type="text" name="title" />
			URL：<input type="text" name="url" />
			<input type ="submit" value="追加" />
		</form>
		<?php
		if($_POST["title"] != ""){
			$title = $_POST["title"];
			$url = $_POST["url"];
			user_url_add($title, $url, $user_id);
		}
			user_url_show($user_id);
			?>
			<br />
			<a href="./share_page.php">共有ページ</a><br />
			<a href="./user_pub_fav.php">公開ブックマーク閲覧ページ</a><br />
			<a href="./user_pub_setting.php">公開設定ページ</a><br />
			<a href="./logout.php">ログアウト</a>
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