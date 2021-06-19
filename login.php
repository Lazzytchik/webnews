<?php 
    session_start();

    require 'dbconfig.php';
    $db = new NewsDB('localhost', 'webnews');
    $db->connect('root', 'root');

    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = $db->get_user($login);
    $count = $user->rowCount();
    $row = $user->fetch(PDO::FETCH_OBJ);

    if($count > 0 && password_verify($password, $row->Hash_password)){
        $_SESSION['username'] = $login;
    }
    
    
    echo "<script>window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();

     
?>