<?php

session_start();
include('functions.php');
check_session_id();




$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM todo_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
exec_query($stmt);

$record = $stmt->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="todo_update.php" method="POST">

    <!-- <legend>（編集画面）</legend> -->

    <ul>
      <div>
        <p style="font-size:20px; font-weight:bold;">お店の名前</p>
        <input type="text" name="namae" value="<?= $record["namae"] ?>" autocomplete="off">
      </div>
      <div>
        <p>特典や割引内容</p>
        <textarea name="mes" value="<?= $record["mes"] ?>" autocomplete="off"></textarea>
      </div>
      <div>
        <button>編集完了</button>
      </div>
    </ul>
    <input type="hidden" name="id" value="<?= $record["id"] ?>">
    <ul><a href="todo_read.php">募集一覧画面</a></ul>
  </form>

</body>

</html>