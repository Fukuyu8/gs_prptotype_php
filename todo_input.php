<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お店の募集画面</title>
</head>

<body>
  <form action="todo_create.php" method="POST">

    <!-- <legend>お店の募集画面</legend> -->

    <ul>
      <div>
        <p style="font-size:20px; font-weight:bold;">お店の名前</p>
        <input type="text" name="namae" autocomplete="off" style="margin:0 10px;">
      </div>
      <div>
        <p>特典や割引内容</p>
        <textarea name="mes" style="margin:0 10px" autocomplete="off"></textarea>
      </div>
      <div>
        <button>募集する</button>
      </div>
    </ul>

  </form>
  <ul>
    <li>
      <a href="todo_read.php">お店の編集画面</a>
    </li>
    <li>
      <a href="todo_read2.php">お客さんがみる掲示板募集画面</a>
    </li>
    <li>
      <a href="todo_logout.php">ログアウト</a>
    </li>
  </ul>
  <p>※このページはお店側の新規募集開始画面です</p>
</body>

</html>