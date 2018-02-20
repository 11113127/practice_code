<?php
session_start();
// 如果有登入前頁面的話，接收參數
if(isset($_SESSION['login'])){
	if($_SESSION['login'] == 'admin'){
	    $url = "admin.php";
	}elseif($_SESSION['login'] == 'user'){
		$url = "user.php";
	}
	header( 'Location: '.$url );
}
?>
<form name="form1" action="login.php" method="post">
<p> 帳號: <input type="text" name="login_id"> </p>
<p> 密碼: <input type="password" name="login_pwd"> </p>
<p> <input type="submit" name="submit" value="登入"> </p>

</form>
