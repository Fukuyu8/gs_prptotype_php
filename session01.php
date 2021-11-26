<?php
// session変数を定義して値を入れよう

session_start();
$_SESSION['num'] = 100; //session変数を定義

echo $_SESSION['num'];//呼び出し、この中のどのファイルからでも呼び出せるようになった
