<?php
// 絶対セッションの時必要なおまじない
session_start(); 
echo $_SESSION['name'] = '山崎';
echo '<br>';
echo $_SESSION['num'] = 1000;
echo $_SESSION['value']=100;

// 検証からアプリケーションからcookieでキーが見れる

$sid = session_id();
echo $sid;


?>