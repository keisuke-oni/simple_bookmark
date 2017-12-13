<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>memo URL</title>
</head>
<body>
	HOME <br />
	<div align="center">
		<h1>memo URL</h1>
		<form action="./login.php" method="post">
		<table>
			<tr>
				<td>ユーザID</td>
				<td><input type="text" name="id" /></td>
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="passwd" /></tr>
			</tr>
		</table>
		<br />
		<input type="submit" value="ログイン" /><br />
		<br />
		<a href="./regist.php">新しいアカウントを登録する！</a>
		<?php
		require("./function.php");
		footer();
		?>
	</div>
</body>
</html>