<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>公開設定ページ | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > <a href="./u_page.php">ユーザページ</a> > 公開設定ページ <br />
	<div align="center">
		<h1>公開設定ページ</h1>
		<?php
		if($_SESSION["id"] != ""){
			$user_id = $_SESSION["id"];
			print "こんにちわ。{$user_id}さん。<br /> \n";
		?>

		<form action="./user_pub_setting.php" method="post">
			ユーザID：<input type="text" name="name" />
			<input type="radio" name="act" value="add" checked /> 追加
			<input type="radio" name="act" value="delete" /> 削除
			<input type ="submit" value="実行" />
		</form><br />
			<?php
			print "あなたがブックマークを公開しているユーザは以下のとおりです。<br /> \n";
			if($_POST["act"] == "add"){
				$u = $_POST["name"];
				pub_fav_useradd($user_id, $u);
			}elseif($_POST["act"] == "delete"){
				$u = $_POST["name"];
				pub_fav_userdelete($user_id, $u);
			}
			pub_fav_usershow($user_id);
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