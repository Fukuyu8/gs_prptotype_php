<?php
// var_dump($_POST);

session_start();
include('functions.php');
//DB接続
$pdo = connect_to_db();
//データ受け取り、変数に入れる
$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users_table
          WHERE username=:username
            AND password=:password
            AND is_deleted=0';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR); //数字の場合はPARAM_INT

exec_query($stmt);


$val = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$val) {
    echo '<p>ログイン情報に誤りがあります</p>';
    echo '<a href="todo_login.php">ログインページへ</a>';
    exit();
} else {
    $_SESSION = array(); // セッション変数を空にする 
    $_SESSION["session_id"] = session_id(); //sessionIDに今取得したIDを入れた
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["username"] = $val["username"];
    header("Location:html/map.html"); // 一覧ページへ移動 
    exit();
}
