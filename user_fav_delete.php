<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ユーザブックマーク削除 | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > <a href="./u_page.php">ユーザページ</a> > ユーザブックマーク削除 <br />
	<div align="center">
		<h1>ユーザブックマーク削除</h1>
		<?php
		if($_SESSION["id"] != ""){
			if($_GET["no"] != ""){
				$user_id = $_SESSION["id"];
				$no = $_GET["no"];
				if($_POST["delete"] != ""){
					user_fav_delete($no, $user_id);
					print "{$user_id}さんのブックマーク、No.{$no}を削除しました。<br /> \n";
					print "<a href=\"./u_page.php\">ユーザページへ戻る</a>";
				}else{
					print "本当に削除しますか？<br /> \n";
					print "<form action=\"./user_fav_delete.php?no={$no}\" method=\"post\"> \n";
					print "<input type=\"hidden\" name=\"delete\" value=\"delete\" /> \n";
					print "<input type=\"submit\" value=\"削除\" /> \n";
					print "</form>";
				}
			}else{
				print "リクエストがありません。<br /> \n";
			}
		}else{
			print "セッションタイムアウトです。<br /> \n";
			print "HOMEからログインしてください。<br /> \n";
			print "<a href=\"./index.php\">HOMEヘ戻る</a> \n";
			session_destroy();
		}
		?>
		<?php
		footer();
		?>
	</div>
</body>
</html>