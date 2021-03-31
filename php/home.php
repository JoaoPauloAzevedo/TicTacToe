<?php include('server.php');?>


<!DOCTYPE html>

<html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="header">
            <h1> HOME </h1>
        </div>

        <div class="content">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION['username'])) : ?>
                <p>OLA CARALHO <strong><?php echo $_SESSION['username']; ?> </strong></p>

                <p><a href= "login.php?logout = '1'" style="color: red;">Logout</a></p>
            <?php endif ?>
        </div>
</html>