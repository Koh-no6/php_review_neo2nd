<?php
include('functions.php');
// データ受け取り
$id = $_GET['id'];
// DB接続
$pdo = connect_to_db();

$sql = 'DELETE FROM review_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  
// SQL実行
header("Location:read.php");
exit();