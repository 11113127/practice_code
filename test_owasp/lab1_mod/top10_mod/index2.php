<?php
if( !empty($_GET['url']) && $_GET['url'] != 'unsafe.php' ){
    header( 'Location: '.basename($_GET['url']) );
}

?>
