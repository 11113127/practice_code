<?php
session_start();
include('conn.php');

if(basename($_SERVER['HTTP_REFERER']) =='admin.php' || basename($_SERVER['HTTP_REFERER']) == 'user.php'){
    if( $_POST['content'] != ''){
        if(isset($_SESSION['login']) && empty($_POST['tno'])){
            $account = $_SESSION['login'];
            $content = htmlentities($_POST['content']);
            $modtime = date('Y/m/d H:i:s');
            $sql = "Insert Into messages Values(null,'".$account."','".$content."','".$modtime."')";
            $rs = mysql_query($sql) or die(mysql_error());
            print('<h1>新增成功!</h1>');
        }elseif($_SESSION['login'] == 'admin'){
            $tno = $_POST['tno'];
            $account = $_POST['account'];
            $content = htmlentities($_POST['content']);
            $modtime = date('Y/m/d H:i:s');
            $sql = "Update messages Set account='".$account."',content='".$content."',modtime='".$modtime."' Where tno='".$tno."'";
            $rs = mysql_query($sql) or die(mysql_error());
            print('<h1>修改成功!</h1>');
        }
        if($_SESSION['login'] == 'user'){
            print('<h1><a href="./user.php">回列表</a></h1>');
        }elseif($_SESSION['login'] == 'admin'){
            print('<h1><a href="./admin.php">回列表</a></h1>');
        }else{
            print('<h1><a href="./index.php">此路不通XD</a></h1>');
        }
        print('<h1><a href="./">回登入頁面</a></h1>');
    }else{
        $url = './';
        header( 'Location: '.$url );
    }
} else {
    echo '你上一頁怪怪的der '.basename($_SERVER['HTTP_REFERER']);

}   
?>
