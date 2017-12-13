<?php
$db = sqlite_open("fkadai_db");
if($db){
	$query = "CREATE TABLE tbl_user(
		id VARCHAR(10), mail VARCHAR(20), passwd VARCHAR(10)
	)";

	$result = sqlite_query($db, $query);

	print "tbl_user作成成功!!<br /> \n";

	$query = "CREATE TABLE tbl_share_fav(
		title VARCHAR(20), url VARCHAR(150), a_date VARCHAR(10), adder VARCHAR(10)
	)";
	
	$result = sqlite_query($db, $query);

	print "tbl_share_fav作成成功!!<br /> \n";

	$query = "CREATE TABLE tbl_user_admit(
		u_from VARCHAR(10), u_to VARCHAR(10)
	)";
	
	$result = sqlite_query($db, $query);

	print "tbl_user_admit作成成功!！<br /> \n";

}else{
	die("データベースが開けません。");
}
sqlite_close($db);
?>