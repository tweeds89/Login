<?php
   require_once 'header.php';
?>
<section class="main-cointainer">
    <div class="main">
        <h2>Strona główna</h2>
        <?php
            if(isset($_SESSION['u_id'])){
                echo "Jesteś zalogowany jako ". $_SESSION['u_username']." <br>";              
            }
        ?>      
    </div>
</section>
</body>
</html>
