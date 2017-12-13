<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>新規アカウントの登録 | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > 新規アカウントの登録 <br />
	<div align="center">
		<h1>送信</h1>
	<?php
	require("./function.php");
	$id = $_POST["id"];
	$mail = $_POST["mail"];
	$passwd = $_POST["passwd"];

	$db = sqlite_open("fkadai_db");

	if($db){
		$query = "INSERT INTO tbl_user(id, mail, passwd) VALUES('{$id}','{$mail}','{$passwd}')";
		$result = sqlite_query($db, $query);

		$query = "CREATE TABLE tbl_{$id}_fav(
			no INTEGER, title VARCHAR(20), url VARCHAR(150), a_date VARCHAR(10)
		)";
		$result = sqlite_query($db, $query);

		print "アカウントを登録しました！<br /> \n";
		print "<a href=\"./index.php\">HOMEヘ戻る</a> \n";
	}else{
		die("データベースが開けません。");
	}
	footer();
	?>
	</div>
</body>
</html>