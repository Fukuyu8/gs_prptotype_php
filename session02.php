<?php
// sessionに保存されている変数を取り出し，計算して表示しよう

session_start();
$_SESSION['num'] += 1; //01で定義したsession変数を呼び出して足す

echo $_SESSION['num'];// session02.phpでは変数を定義していないが，セッションの機能で呼び出せる!
