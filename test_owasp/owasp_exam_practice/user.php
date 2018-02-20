<?php
session_start();
include('conn.php');

// 檢查登入狀況，沒登入就轉到首頁
if( $_SESSION['login'] != 'user' ){
    header( 'Location: ./index.php');
}

$sql = 'Select * From messages order by modtime DESC';
$rs = mysql_query($sql) or die(mysql_error());
?>
<form action="addmsg.php" method="post">
<h1>您現在的身分是 <span style="color:red;"><?php print(htmlentities($_SESSION['login']));?></span></h1>
<h1>請在下面留言並送出：</h1>
<p><textarea name="content" id="content" cols="30" rows="10"></textarea></p>
<p> <input type="submit" name="submit" value="確定"> </p>
</form>
<div>
<a href="./logout.php">登出</a>	
<?php
while($row = mysql_fetch_array($rs)){
?>
    <table border="1" width="400">
        <tr><td width="100">編號：</td><td><?php print(htmlentities($row['tno']));?></td></tr>
        <tr><td>留言時間：</td><td><?php print(htmlentities($row['modtime']));?></td></tr>
        <tr><td>留言人：</td><td><?php print(htmlentities($row['account']));?></td></tr>
        <tr><td>內容：</td><td><?php print(nl2br(htmlentities($row['content'])));?></td></tr>
    </table>
</div>
<br />

<?php
}
?>
