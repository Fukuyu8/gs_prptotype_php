<?php

session_start();
include('functions.php');
check_session_id();




if (
  !isset($_POST['namae']) || $_POST['namae'] == '' ||
  !isset($_POST['mes']) || $_POST['mes'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$namae = $_POST['namae'];
$mes = $_POST['mes'];

$pdo = connect_to_db();

//'INSERT INTO todo_table(id, namae, mes) VALUES(NULL, :namae, :mes)';
$sql = 'INSERT INTO `todo_table`(`id`, `namae`, `mes`) VALUES (NULL,:namae,:mes)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':namae', $namae, PDO::PARAM_STR);
$stmt->bindValue(':mes', $mes, PDO::PARAM_STR);
exec_query($stmt);

header("Location:todo_input.php");
exit();
