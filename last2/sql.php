<?php
$user = "root";
$pass = "root";
$dbname = "mysql:host=localhost;dbname=library";

try{
  $dbh = new PDO($dbname, $user, $pass,  array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
  ));
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

date_default_timezone_set('Asia/Tokyo');

?>
