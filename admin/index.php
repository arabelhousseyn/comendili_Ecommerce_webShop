<?php 
session_start();
if(isset($_SESSION['usernm']))
{
    header("Location: dashboard.php");
}
include('ini.php');
$style='display:none;';
$statu = '';
$msg= '';
if(isset($_POST['login']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashPswd = sha1($password);
    $sql = 'SELECT * FROM users WHERE username = ? AND password = ? AND groupID = 1'; // mysql target
    $res = $con->prepare($sql); // prepare the statement 
    $res->execute(array($username,$hashPswd)); //execute the statement  and compare in the same time
    $raw = $res->fetch();
    $count = $res->rowCount(); // row correspandent

    if($count > 0)
    {
        
            $_SESSION['usernm'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['ID'] = $raw['ID'];
        @$_SESSION['language'] = @$raw['language'];
        header("Location: dashboard.php");
        exit();
        

    } else{
        $style='display:block';
        $statu = 'danger';
        $msg = '<ul><li>
        username or password is incorrect
        </li></ul>';

    }
    
   
}
include($tmpl . 'header.php');
include($tmpl . 'mainLogin.php');

