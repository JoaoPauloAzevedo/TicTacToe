<?php include('server.php');?>

<!DOCTYPE html>
<html>
    <head>
        <title>Perfil</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="header">
            <h1> Perfil </h1>
        </div>

        <form method="post" action="home.php">

            <?php 
                $currentUser = $_SESSION['email'];
                $query = "SELECT * FROM users WHERE email='$currentUser'";
                $dados = mysqli_query($db, $query);
                if($dados){
                    if(mysqli_num_rows($dados) >0 ){
                        while($row = mysqli_fetch_array($dados)){
                            ?>
                            
                            <div class="input-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $row['username']; ?>">
                            </div> 
                            <div class="input-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $row['email']; ?>">
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
                                <button type="submit" name="update" class="btn" >Guardar</button>
                            </div>

                            <?php
                        }
                    }
                }
            
            ?>
           
        
        </form>

    </body>



</html>