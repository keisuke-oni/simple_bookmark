<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Regist new account | memo URL</title>
</head>
<body>
	<a href="./index.php">HOME</a> > 新規アカウントの登録 <br />
	<div align="center">
		<h1>新規アカウントの登録</h1>
		<font color="red">すべての項目を入力してください。</font>
		<form action="confirm.php" method="post">
		<table>
			<tr>
				<td>ユーザID</td>
				<td><input type="text" name="id" /></td>
			</tr>
			<tr>
				<td></td>
				<td>※10文字以下</td>
			</tr>
			<tr>
				<td>メールアドレス</td>
				<td><input type="text" name="mail" /></td>
			</tr>
			<tr>
				<td></td>
				<td>※16文字以下でous.jpのドメインのみ登録可能</td>
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="passwd" /></td>
			</tr>
			<tr>
				<td></td>
				<td>※10文字以下</td>
			</tr>
		</table>
		<br />
		<input type="submit" value="確認" /><br />
		<?php
		require("./function.php");
		footer();
		?>
	</div>
</body>
</html>