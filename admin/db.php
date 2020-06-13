<?php
$struct = 'mysql:host =localhost;dbname=comendili';
$username = 'root';
$password = '';
$bolDB = false;
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
    $con = new PDO($struct,$username,$password,$option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bolDB = true;
    
  
} catch (PDOException $th) {

    echo 'not good' . $th->getMessage();


   
}
