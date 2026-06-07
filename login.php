<?php
    $name = $_POST['username'];
    $password = $_POST['password'];
    $dsn = 'mysql:host=localhost; dbname=testdb; charset=utf8';

    try {
        $pdo = new PDO($dsn, 'user', '0113');
    } catch (PDOException $e) {
        echo '接続できませんでした';
    }

    $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
    $stmt = $pdo->prepare($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo 'ログイン成功';
    } else {
        echo 'ログイン失敗';
    }
?>