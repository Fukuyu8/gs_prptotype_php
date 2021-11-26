<?php

function connect_to_db()
{
  $dbn = 'mysql:dbname=gs_kadai;charset=utf8;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';

  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('DB エラー:' . $e->getMessage());
  }
}

function exec_query($stmt)
{
  try {
    $stmt->execute();
  } catch (PDOException $e) {
    exit('SQL エラー：' . $e->getMessage());
  }
}

// ログイン状態のチェック関数
function check_session_id()
{
  if (
    !isset($_SESSION['session_id']) || //一つ目の条件
    $_SESSION['session_id'] != session_id()
  ) {
    header('Location:todo_login.php');
  } else {
    session_regenerate_id(true);
    $_SESSION['session_id'] = session_id();
  }
}
