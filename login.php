<?php
session_start();
require("./function.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Login | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > ログイン<br />
	<div align="center">
		<h1>ログイン</h1>
	<?php
	$db = sqlite_open("fkadai_db");
	if($db){
		if($_POST["id"] != "" && $_POST["passwd"] != ""){
			$id = $_POST["id"];
			$passwd = $_POST["passwd"];
			$query = "SELECT id,passwd FROM tbl_user WHERE id = '{$id}'";
			$result = sqlite_query($db, $query);
			$info = sqlite_fetch_array($result);
			if($passwd == $info["passwd"]){
				$_SESSION["id"] = $id;
				print "ログイン成功です。<br />次へを押してください。<br /> \n";
				print "<a href=\"./u_page.php\">次へ</a>";
			}else{
				print "ユーザIDもしくはパスワードが違います。<br /> \n";
				print "ブラウザの戻るボタンを使って前のページに戻り、誤りを訂正してください。 \n";
				session_destroy();
			}
		}else{
			print "ユーザIDとパスワードが入力されていません。<br /> \n";
			print "ブラウザの戻るボタンを使って前のページに戻ってやり直してください。<br > \n";
			session_destroy();
		}
	}else{
		die("Can't get the data.");
		session_destroy();
	}
	sqlite_close($db);
	footer();
	?>
	</div>
</body>
</html>