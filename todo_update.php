<?php
session_start();
include('functions.php');
check_session_id();



if (
  !isset($_POST['namae']) || $_POST['namae'] == '' ||
  !isset($_POST['mes']) || $_POST['mes'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$namae = $_POST["namae"];
$mes = $_POST["mes"];
$id = $_POST["id"];

$pdo = connect_to_db();

$sql = "UPDATE todo_table SET namae=:namae, mes=:mes WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':namae', $namae, PDO::PARAM_STR);
$stmt->bindValue(':mes', $mes, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
exec_query($stmt);

header("Location:todo_read.php");
exit();
