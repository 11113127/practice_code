<?php
session_start();
function set_token() {
	$_SESSION["token"] = md5(microtime(true));
}

function valid_token() {
	$return = $_POST["token"] === $_SESSION["token"] ? true : false;
	set_token();
	return $return;
}

if(!isset($_SESSION["token"]) || $_SESSION["token"]=="") {
	set_token();
}

if(isset($_POST["test"])){
	 echo  "----".$_SESSION["token"]."----";
	if(!valid_token()){
		echo "token error";
	}else{
		echo "成功提交，Value:".$_POST["test"];
	}
}
?>
<form method="post" action="">
	<input type="hidden" name="token" value="<?php echo $_SESSION["token"]?>">
	<input type="text" name="test" value="Default">
	<input type="submit" value="提交">
</form>