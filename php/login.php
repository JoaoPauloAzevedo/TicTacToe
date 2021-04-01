<?php include('server.php');?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="header">
            <h1> Login </h1>
        </div>

        <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        
           <div class="input-group">
           <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
           </div> 
           <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
           </div>  
           <div class="input-group">
            <button type="submit" name="login" class="btn">Log in</button>
           </div>

            <p>
                Ainda nao tem conta? Regite-se <a href="registo.php">Registar</a>
            </p>

        
        </form>

    </body>

</html>