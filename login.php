<?php
    $name = $_POST['username'];
    $password = $_POST['password'];
    $dsn = 'mysql:host=localhost; dbname=test; charset=utf8';

    try {
        $pdo = new PDO($dsn, 'user', 'userpass1');
    } catch (PDOException $e) {
        echo '接続できませんでした';
    }

    $sql = "SELECT * FROM users WHERE user_name = :name AND user_pass = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name, ':password' => $password]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo 'ログイン成功';
    } else {
        echo 'ユーザー名かパスワードが違います';
    }
?>