<?php
require_once 'connection.php';

$sql = "CREATE TABLE users (
       user_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       user_first varchar(256) NOT NULL,
       user_last varchar(256) NOT NULL,
       user_email varchar(256) NOT NULL,
       user_username varchar(256) NOT NULL,
       user_pass varchar(256) NOT NULL)";

$result = $conn->query($sql);

if ($result == TRUE) {
    echo "Tabela users została stworzona poprawnie <br>";
} else {
    echo "Tabela users nie została stworzona: ". $conn->error;
}