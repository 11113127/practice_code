<?php
session_start();
include('conn.php');
if( $_POST['login_id'] != '' && $_POST['login_pwd'] != '' ){
    $account = htmlentities($_POST['login_id']);
    $password = htmlentities($_POST['login_pwd']);
    $sql = "Select * From member Where account='".$account."' And password='".$password."'";
    $rs = mysql_query($sql) or die(mysql_error());
    if( mysql_num_rows($rs) == 1 ){
        $_SESSION['login'] = $_POST['login_id'];
        // 如果沒有登入前頁面就各自轉到權限頁面，否則轉到登入前頁面
        if( $_GET['url'] == '' ){
            if($_POST['login_id'] == 'user'){
                $url = 'user.php';
            }elseif($_POST['login_id'] == 'admin'){
                $url = 'admin.php';
            }
        }else{
            $url = $_GET['url'];
        }
    }else {
        $url = './';
    }
}else{
    $url = './';
}
header( 'Location: '.$url );
?>
