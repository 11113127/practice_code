<?php
session_start();

if( $_GET['login'] == 'user' ){
    $_SESSION['login'] = 'user';
    $url = 'user.php';
}else{
    $_SESSION['login'] = 'admin';
    $url = 'admin.php';
}

header( 'Location: '.$url );
?>
