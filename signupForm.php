<?php
   require_once 'header.php';
?>
<section class="main-cointainer">
    <div class="main">
        <h2>Zarejestruj się</h2>
        <form class="signup-form" action="signup.php" method="POST">
            <input type="text" name="first" placeholder="Imię">
            <input type="text" name="last" placeholder="Nazwisko">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="username" placeholder="Login">
            <input type="password" name="pass" placeholder="Hasło">
            <button type="submit" name="submit">Zarejestruj</button>
        </form>
    </div>
</section>
</body>
</html>
