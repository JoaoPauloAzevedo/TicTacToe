<?php
    $username = "";
    $email = "";
    $password = "";
    $conf_password = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'tictactoe');

    if(isset($_POST['registo'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);
    }

    if(empty($username)){
        array_push($errors, "Username é necessario");
    }

    if(empty($email)){
        array_push($errors, "Email é necessario");
    }

    if(empty($password)){
        array_push($errors, "Passowrd é necessario");
    }
    
    if($password != $conf_password){
        array_push($errors, "As passwords nao são iguais");
    }

    if(count($errors)==0){
        $password = md5($password);
        $sql = "INSERT INTO users (username, email, password ) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $sql);
    }


?>