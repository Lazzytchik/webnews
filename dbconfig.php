<?
    // Процедура для подключения к базе данных

    $dsn = 'mysql:host=localhost;dbname=webnews';
    $pdo = new PDO($dsn, 'root', 'root');
?>