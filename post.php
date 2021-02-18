<?php

function getDB() {
    $dbConnection = new PDO('sqlite:eshop');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
}

if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password']) ){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
                        try {
                                $DB=getDB();
                                $DB->exec("INSERT INTO users (firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$password');");
                                
                            // close the database connection
                            $DB = NULL;                
                        }        
                                catch(PDOException $e){
                            echo 'Exception : '.$e->getMessage();
                        }
                        include_once 'login.html';
}
else (include_once 'login.html')

?>