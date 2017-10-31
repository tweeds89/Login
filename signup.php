<?php

if (isset($_POST['submit'])){
    
    require_once 'connection.php';
    require_once 'signupForm.php';
     
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    
    //Sprawdzenie pustych pól
    if(empty($first) || empty($last) || empty($email) || empty($username) || empty($pass)){      
       echo "Należy uzupełnić wszystkie pola!";
       
    }else{      
        //Sprawdzenie poprawności znaków
        if (!preg_match("/^[a-zA-ZąĄćĆęĘłŁńŃóÓśŚźŹżŻ]*$/", $first) || !preg_match("/^[a-zA-ZąĄćĆęĘłŁńŃóÓśŚźŹżŻ]*$/", $last)){
           echo "Wprowadzono niedozwolone znaki!";
           
        }else{            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Sprawdź poprawność adresu e-mail!"; 
                
           }else{
                $sql = "SELECT * FROM users WHERE user_username ='$username'";
                $result = $conn ->query($sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                   echo "Login jest zajęty!";  
                   
                }else{                 
                    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                    
                    //Wprowadzenie użytkownika do bazy
                    $sql = "INSERT INTO users (user_first, user_last, user_email,
                            user_username, user_pass) VALUES ('$first', '$last', '$email',
                            '$username', '$hashedPass');";
                    $result= $conn ->query($sql);
                    echo "Rejestracja zakończona sukcesem!";   
                }
           }
        }
    }   
}else{
    header("Location: signupForm.php");
    exit();
}
  