<?php
include 'database.php';

if(isset($_REQUEST['password']) && isset($_REQUEST['email']) )
{
    
    if(md5($_REQUEST['password']) === '8f8555f2a342f17f74b48a8c31ed9980' && $_SERVER['REMOTE_ADDR'] === '127.0.0.1' && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
        echo $msg;
    }
    else
        header('Location: ./index.html#error');
}
else if(isset($_REQUEST['download'])){
    $_REQUEST['download'] = base64_decode($_REQUEST['download']);
        if (preg_match("/database.php/i", $_REQUEST['download']))
            die('access denied file');
            
        header('Content-Disposition: attachment; filename='.$_REQUEST['download']);
        header('Content-Type: application/octet-stream');
        fpassthru(fopen($_REQUEST['download'], 'rb'));
}
else
    header('Location: ./index.html#fix');


?>
