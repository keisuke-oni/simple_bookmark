<?php
session_start();
require("./function.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログアウト | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > ログアウト <br />
	<div align="center">
		<h1>ログアウト</h1>
		<?php
		if($_SESSION["id"] != ""){
			print "ログアウトしました。<br /> \n";
			print "<a href=\"./index.php\">HOMEヘ戻る</a> \n";
			session_destroy();
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