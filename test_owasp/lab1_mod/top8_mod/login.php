<?php
session_start();

if( $_POST['login_id'] == 'admin' && $_POST['login_pwd'] == '123' ){
    $_SESSION['login'] = 'admin';
    $url = 'admin.php';
}else{
    $url = './';
}

header( 'Location: '.$url );
?>
