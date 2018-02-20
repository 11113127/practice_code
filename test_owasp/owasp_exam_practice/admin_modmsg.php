<?php
session_start();
include('conn.php');
// 修改編號
$no = trim(htmlentities($_GET['no']));
// 撈出對應編號的資料
if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'){
	if(is_numeric($no)){
		$sql = "Select * From messages Where tno='".$no."'";
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($rs);

		$str =<<<forms
			<form action="addmsg.php" method="post">
				<h1>您現在的身分是 <span style="color:red;">{$_SESSION['login']}</span></h1>
				<h1>編輯留言：</h1>
				<p><input type="hidden" name="tno" value="{$row['tno']}"></p>
				<p><input type="text" name="account" value="{$row['account']}"></p>
				<p><textarea name="content" id="content" cols="30" rows="10">{$row['content']}</textarea></p>
				<p> <input type="submit" name="submit" value="確定"> </p>
			</form>
forms;
		print $str;
	} else {
		echo "輸入不是數字 別想攻擊 3秒後回首頁";
		header("refresh:3; ./index.php");
	}
} else {
	echo "沒登入過 3秒後給你導回首頁";
	header("refresh:3; ./index.php");
}


?>
