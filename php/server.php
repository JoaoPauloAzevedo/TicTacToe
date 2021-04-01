<?php

    session_start();

    $username = "";
    $email = "";
    $errors = array();
    $password ="";
    $conf_password="";

    $db = mysqli_connect('localhost', 'root', '', 'tictactoe');


    //registo

    if(isset($_POST['registo'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $conf_password = mysqli_real_escape_string($db, $_POST['conf_password']);

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
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Bem vindo ao ZÉ DOS CÃES";
            header('location: home.php');
        }

    }

    //Login

    if (isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);


        if(empty($email)){
            array_push($errors, "Email necessario");
        }

        if(empty($password)){
            array_push($errors, "Password necessario");
        }

        if(count($errors)==0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password";
            $result = mysqli_query($db, $query);
            if($result && mysqli_num_rows($result) > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "Bem vindo ao ZÉ DOS CÃES";
                header('location: home.php');
            }else{
                array_push($errors, "Nao sabes a tua conta seu crl?");
            
            }
        }
       
    
        

    }
        
        


    //Logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['USERNAME']);
        header('location: login.php');
    }

   

    




?>