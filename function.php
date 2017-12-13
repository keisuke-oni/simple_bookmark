<?php
function footer(){
	print "<br />";
	print "<hr>";
	print "Copyright (C) 2014 Keisuke Inoue(I13I006). All Right Reserved.";
}

function user_url_add($title, $url, $user_id){
	$db = sqlite_open("fkadai_db");
	$a_date = date('Y/m/d');
	$no = 0;
	$query = "SELECT no FROM tbl_{$user_id}_fav";
	$result = sqlite_query($db, $query);
	while($info = sqlite_fetch_array($result)){
		$no = $info["no"];
	}
	$no++;
	$query = "INSERT INTO tbl_{$user_id}_fav(no, title, url, a_date) VALUES({$no},'{$title}','{$url}','{$a_date}')";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function user_url_show($user_id){
	$db = sqlite_open("fkadai_db");
	$query = "SELECT * FROM tbl_{$user_id}_fav";
	$result = sqlite_query($db, $query);
	print "<table border=\"2\">";
	print "<tr bgcolor=\"#BBBBBB\"><th>No.</th><th>タイトル</th><th>URL</th><th>日付</th><th>変更</th><th>削除</th></tr> \n";
	while($info = sqlite_fetch_array($result)){
		print "<tr><td>{$info["no"]}</td><td>{$info["title"]}</td><td><a href=\"{$info["url"]}\" target=\"_blank\">{$info["url"]}</a></td><td>{$info["a_date"]}</td><td><a href=\"./user_fav_change.php?no={$info["no"]}\"><button type=\"button\" value=\"変更\">変更</button></a></td><td><a href=\"./user_fav_delete.php?no={$info["no"]}\"><button type=\"button\" value=\"削除\">削除</button></a></td><tr>";
	}
	print "</table> \n";
	sqlite_close($db);
}

function user_fav_delete($no, $user_id){
	$db = sqlite_open("fkadai_db");
	$query = "DELETE FROM tbl_{$user_id}_fav WHERE no = {$no}";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function user_fav_change($no, $title, $url, $user_id){
	$db = sqlite_open("fkadai_db");
	$query ="UPDATE tbl_{$user_id}_fav SET title = '{$title}', url = '{$url}' WHERE no = {$no}";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function share_url_add($title, $url, $user_id){
	$db = sqlite_open("fkadai_db");
	$a_date = date('y/m/d');
	$query = "INSERT INTO tbl_share_fav(title, url, a_date, adder) VALUES('{$title}','{$url}','{$a_date}','{$user_id}')";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function share_url_show(){
	$db = sqlite_open("fkadai_db");
	$query = "SELECT * FROM tbl_share_fav";
	$result = sqlite_query($db, $query);
	print "<table border=\"2\">";
	print "<tr bgcolor=\"#BBBBBB\"><th>タイトル</th><th>URL</th><th>日付</th><th>追加ユーザ名</th></tr> \n";
	while($info = sqlite_fetch_array($result)){
		print "<tr><td>{$info["title"]}</td><td><a href=\"{$info["url"]}\" target=\"_blank\">{$info["url"]}</a></td><td>{$info["a_date"]}</td><td>{$info["adder"]}</td><tr>";
	}
	print "</table> \n";
	sqlite_close($db);
}

function pub_fav_usershow($user_id){
	$db = sqlite_open("fkadai_db");
	$query = "SELECT u_to FROM tbl_user_admit WHERE u_from = '{$user_id}'";
	$result = sqlite_query($db, $query);
	print "<table border=\"2\">";
	print "<tr bgcolor=\"#BBBBBB\"><th>公開先</th></tr>";
	while($info = sqlite_fetch_array($result)){
		print "<tr><td>{$info["u_to"]}</td></tr>";
	}
	print "</table> \n";
	sqlite_close($db);
}

function pub_fav_useradd($user_id, $u){
	$db = sqlite_open("fkadai_db");
	$query = "INSERT INTO tbl_user_admit(u_from, u_to) VALUES('{$user_id}','{$u}')";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function pub_fav_userdelete($user_id, $u){
	$db = sqlite_open("fkadai_db");
	$query = "DELETE FROM tbl_user_admit WHERE u_from = '{$user_id}' AND u_to = '{$u}'";
	sqlite_query($db, $query);
	sqlite_close($db);
}

function pub_fav_show($show_id){
	$db = sqlite_open("fkadai_db");
	$query = "SELECT * FROM tbl_{$show_id}_fav";
	$result = sqlite_query($db, $query);
	print "<table border=\"2\">";
	print "<tr bgcolor=\"#BBBBBB\"><th>タイトル</th><th>URL</th><th>日付</th></tr> \n";
	while($info = sqlite_fetch_array($result)){
		print "<tr><td>{$info["title"]}</td><td><a href=\"{$info["url"]}\" target=\"_blank\">{$info["url"]}</a></td><td>{$info["a_date"]}</td><tr>";
	}
	print "</table> \n";
	sqlite_close($db);
}

?>