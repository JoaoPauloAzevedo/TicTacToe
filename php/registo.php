<?php include('server.php');?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registo</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="header">
            <h1> Registo </h1>
        </div>

        <form method="post" action="registo.php">

            <?php include('errors.php'); ?>

           <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
           </div> 
           <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
           </div> 
           <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
           </div> 
           <div class="input-group">
            <label>Confirmar Password</label>
            <input type="password" name="conf_password">
           </div> 
           <div class="input-group">
            <button type="submit" name="registo" class="btn" >Registar</button>
           </div>

            <p>
                Ja tem conta? <a href="login.php">Log in</a>
            </p>

        
        </form>

    </body>



</html>