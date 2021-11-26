<?php
session_start(); //セッションの開始
$_SESSION = array(); //セッション変数をからの配列で上書き
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
} // クッキーの保持期限を過去にする
session_destroy(); // セッションの破棄
header('Location:todo_login.php'); // ログインページヘ移動
exit();