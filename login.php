<?php
$dir = 'sqlite:eshop';
$dbh  = new PDO($dir) or die("cannot open the database");
$username=$_GET["username"];
$password=$_GET["password"];

$stmt = $dbh->prepare(" SELECT * FROM users  WHERE username=:user AND password=:pass " ) ;
$stmt->execute(['user' => $username,'pass' => $password]);
$result = $stmt->fetch();
if( !empty($result)):
    echo "User exists";
else:
    echo "User doesnt exist";
endif;
?>

