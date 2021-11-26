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
    $output .= "<tr>";
    $output .= "<td>{$record["namae"]}</td>";
    $output .= "<td>{$record["mes"]}</td>";

    // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>編集する</a></td>";
    // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>削除する（募集を止める）</a></td>";
    $output .= "</tr>";
}
unset($value);




?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <table>
            <thead>
                <tr>
                    <th>お店の名前</th>
                    <th>特典や割引</th>

                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
    <div>ここにmapへ飛ぶボタンをつける</div>
</body>

</html>