<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>公開ブックマーク閲覧ページ | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > <a href="./u_page.php">ユーザページ</a> > 公開ブックマーク閲覧ページ <br />
	<div align="center">
		<h1>公開ブックマーク閲覧ページ</h1>
		<?php
		if($_SESSION["id"] != ""){
			$user_id = $_SESSION["id"];
			print "こんにちわ。{$user_id}さん。<br /> \n";
			print "あたなに公開を許可しているユーザが以下に表示されます。<br /> \n";
		?>
		<form action="./user_pub_fav.php" method="post">
			<select name="show_id">
				<?php
				$db = sqlite_open("fkadai_db");
				$query = "SELECT u_from FROM tbl_user_admit WHERE u_to = '{$user_id}'";
				$result = sqlite_query($db, $query);
				while($info = sqlite_fetch_array($result)){
					print "<option value=\"{$info["u_from"]}\">{$info["u_from"]}</option> \n";
				}
				sqlite_close($db);
				?>
			</select>
			<input type ="submit" value="表示" />
		</form><br />
			<?php
			if($_POST["show_id"] != ""){
				$show_id = $_POST["show_id"];
				print "{$show_id}さんのブックマークは以下のとおりです。<br /> \n";
				pub_fav_show($show_id);
			}
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