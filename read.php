<?php

include('functions.php');

$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM `review_table`';

$stmt = $pdo->prepare($sql);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchALL(PDO::FETCH_ASSOC);

$output = "";

foreach ($result as $record){
  $output .= "<ul><li>{$record['bar_name']}</li>
              <li><span>{$record['area']}</span><span>{$record['category']}</span></li>
              <li>{$record['review_point']}</li>
              <li><a href=\"{$record['link']}\" target=\"_blank\">{$record['link']}</a></li>
              <li><a href='delete.php?id={$record["id"]}'>削除</a></li></ul>";
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>イチ推し飲み屋リスト-NEO（一覧画面）</title>
</head>

<body id="body">
  <div class="foam"></div>
  <div class="foam"></div>
  <div class="foam"></div>
  <div class="foam"></div>
  <fieldset class="result">
    <legend>イチ推し飲み屋リスト-NEO <span>一覧画面</span></legend>
      <?= $output ?>
    <div class="btn">
      <a class="list-btn" href="index.php">入力画面へ</a>
    </div>
  </fieldset>
</body>

</html>