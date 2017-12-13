<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>入力情報の確認 | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > 新規アカウントの登録 <br />
	<div align="center">
		<h1>確認</h1>
	<?php
	require("./function.php");
	if($_POST["id"] != "" && $_POST["mail"] != "" && $_POST["passwd"] != ""){
	$id = $_POST["id"];
	$mail = $_POST["mail"];
	$passwd = $_POST["passwd"];
	$judge = 0;
	if(!ereg("^([a-zA-Z0-9\._-])+@{1,1}(ous\.jp)$",$mail)){
		$judge = 1;
	}
	?>
		<form action="submit.php" method="post">
		<table>
			<tr>
				<td>ユーザID</td>
				<td><?php print $id; ?></td>
				<td><input type="hidden" name="id" value="<?php print $id; ?>" /></td>
			</tr>
			<tr>
				<td>メールアドレス</td>
				<td><?php print $mail; if($judge == 1){print " <font color=\"red\">※ドメインがous.jpではありません。</font>";}?></td>
				<td><input type="hidden" name="mail" value="<?php print $mail; ?>" /></tr>
			</tr>
			<tr>
				<td>パスワード</td>
				<td>セキュリティのため表示していません。</td>
				<td><input type="hidden" name="passwd" value="<?php print $passwd; ?>"/></tr>
			</tr>
		</table>
		<br />
	<?php
	if($judge == 0){
	?>
		<input type="submit" value="登録" /><br />
	<?php
	}else{
	?>
		<font color="red">ブラウザの戻るボタンを使って前のページに戻り、誤りを訂正してください。<br /></font>
	<?php
	}
	?>
	<?php
	}else{
	?>
		<font color="red">入力されていない項目があります。<br />
		ブラウザの戻るボタンを使って前のページに戻り、誤りを訂正してください。<br /></font>
	<?php
	}
	footer();
	?>
	</div>
</body>
</html>