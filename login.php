<?php
require_once 'header.php';

if(isset($_POST['submit'])){
    require_once 'connection.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    
    //Sprawdzenie pustych pól
    if(empty($username) || empty($pass)){
        echo "Wypełnij wszystkie pola!";
            
    }else{
        $sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email='$username'";
        $result = $conn ->query($sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            echo "Nieprawidłowy login lub hasło!";
            
        }else{
            if($row = mysqli_fetch_assoc($result)){
                
                $hashedPassCheck = password_verify($pass, $row['user_pass']);
                if($hashedPassCheck == false){
                   echo "Nieprawidłowy login lub hasło!";
                   
                }else{
                    //Logowanie
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_username'] = $row['user_username'];
                    header("Location: index.php");
                    exit();                                  
                }
            }     
        }
    } 
}else{
    header("Location: index.php");
    exit();
}