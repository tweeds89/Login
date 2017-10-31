<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<header>
    <nav>
        <div class="main">
            <ul>
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="signupForm.php">Rejestracja</a></li>
            </ul>
            <div class="login">
                <?php
                   if(isset($_SESSION['u_id'])){
                       echo ' <form action = "logout.php" method="POST">
                                 <button type="submit" name="submit">Wyloguj</button>
                               </form>';
                   }else{
                       echo '<form action="login.php" method="POST">                    
                            <input type="text" name="username" placeholder="Nazwa użytkownika/E-mail">                
                            <input type="password" name="pass" placeholder="Hasło">
                            <button type="submit" name="submit">Zaloguj</button>
                            </form>';                                                               
                   }
                ?>                              
            </div>
        </div>
    </nav>     
</header>