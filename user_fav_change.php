<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ユーザブックマーク変更 | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > <a href="./u_page.php">ユーザページ</a> > ユーザブックマーク変更 <br />
	<div align="center">
		<h1>ユーザブックマーク変更</h1>
		<?php
		if($_SESSION["id"] != ""){
			if($_GET["no"] != ""){
				$user_id = $_SESSION["id"];
				$no = $_GET["no"];
				if($_POST["title"] != "" && $_POST["url"] != ""){
					$title = $_POST["title"];
					$url = $_POST["url"];
					user_fav_change($no, $title, $url, $user_id);
					print "{$user_id}さんのブックマーク、No.{$no}を変更しました。<br /> \n";
					print "<a href=\"./u_page.php\">ユーザページへ戻る</a>";
				}else{
					$db = sqlite_open("fkadai_db");
					$query = "SELECT title, url FROM tbl_{$user_id}_fav WHERE no = {$no}";
					$result = sqlite_query($db, $query);
					$info = sqlite_fetch_array($result);
					
					print "どのように変更しますか？<br /> \n";
					print "<form action=\"./user_fav_change.php?no={$no}\" method=\"post\"> \n";
					print "タイトル：<input type=\"text\" name=\"title\" value=\"{$info["title"]}\" /> \n";
					print "URL：<input type=\"text\" name=\"url\" value=\"{$info["url"]}\" /> \n";
					print "<input type=\"submit\" value=\"変更\" /> \n";
					print "</form>";

					sqlite_close($db);
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