<?php
session_start();
include('functions.php');
check_session_id();



$pdo = connect_to_db();

$sql = 'SELECT * FROM todo_table';

$stmt = $pdo->prepare($sql);
exec_query($stmt);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
    // $output .= "<tr>";
    $output .= "<td>{$record["namae"]}</td>";
    $output2 .= "<td>{$record["mes"]}</td>";

    // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>編集する</a></td>";
    // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>削除する（募集を止める）</a></td>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>shopinfo</title>
</head>

<body>
    <div class="shop_title">
        <div class="shop_name">お店の名前</div>

        <div> <?= $output ?></div>
        <div class="shop_star">評価</div>
    </div>

    <div class="shop_scroll">
        <!-- 店内雰囲気写真 -->
        <div class="shop_photo">
            <div><img src="https://localhost/prototype_phtm/html/img/shopin.png"></div>
            <div><img src="https://localhost/prototype_phtm/html/img/shopin2.png"></div>
            <div><img src="https://localhost/prototype_phtm/html/img/shopin3.png"></div>
        </div>

        <!-- メニュー -->
        <div class="menu">メニュー</div>
        <!-- 写真 -->
        <div class="menu_photo">
            <img src="https://localhost/prototype_phtm/html/img/menu.png">
            <img src="https://localhost/prototype_phtm/html/img/menu2.png">
            <img src="https://localhost/prototype_phtm/html/img/menu3.png">
        </div>
        <!-- 特典・割引情報 -->
        <!-- テキスト -->
        <div class="bonus_box">
            <div class="bonus">特典・割引情報</div>

            <div> <?= $output2 ?></div>
        </div>
    </div>
    <!-- 予約ボタン -->
    <div class="yoyaku_btn_main">
        <input type="submit" id="yoyakuBtn" class="yoyaku_btn" value="予約する">
    </div>

    <!-- この下にアイコン -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#yoyakuBtn").on("click", function() {
            location.href = 'yoyakuform.html'
        });
    </script>

</body>

</html>