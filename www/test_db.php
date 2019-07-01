<?php
$user = 'root';
$pass = 'digital2019';

try {
     $dbh = new PDO('mysql:host=mariadb;dbname=mysql', $user, $pass);
     $dbh = null;
     echo "Success: A proper connection to MySQL was made! The docker database is great.<br>";
} catch (PDOException $e) {
     echo "Error: Unable to connect to MySQL. <br>";
     print $e->getMessage() . "<br>";
     die();
}

