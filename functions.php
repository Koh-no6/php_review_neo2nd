<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=bar_review01;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
    $pdo = new PDO($dbn, $user, $pwd);
    return $pdo;
    } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
    }
}
?>