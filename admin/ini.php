<?php
include('db.php');  // database connection
$language = (isset($_GET['language'])) ? $language = $_GET['language'] : $language = 'none';
$custom = 'layout/v1/'; // custom path
$tmpl = 'includes/templates/v1/'; //custom path
$css = $custom . 'css/'; //css path
$js = $custom . 'js/'; //js path
$clip = 'data/invoices/'; // invoice path
$photos = 'data/up/'; // photos path
$fonts = $custom . 'fonts/'; // fonts path
$img = $custom . 'images/'; // images path
$langs = 'includes/langs/'; ///////////// languages path

if(isset($_GET['language']) && is_numeric($_GET['language']))
{
    if($_GET['language'] == 0)
    {
      $stm = $con->prepare('UPDATE users SET language=? WHERE ID = ?');
      $stm->execute(array(0,$_SESSION['ID']));
      $_SESSION['language'] = 0;
       
    } elseif($_GET['language'] == 1)
    {
        $stm = $con->prepare('UPDATE users SET language=? WHERE ID = ?');
      $stm->execute(array(1,$_SESSION['ID']));
      $_SESSION['language'] = 1;
    }elseif($_GET['language'] == 2)
    {
        $stm = $con->prepare('UPDATE users SET language=? WHERE ID = ?');
        $stm->execute(array(2,$_SESSION['ID']));
        $_SESSION['language'] = 2;
    }
}

if(@$_SESSION['language'] == 0)
{
    include($langs . 'en.php'); /// english language  
    setcookie('language', 'en', time() + (86400 * 30), "/"); 
}elseif($_SESSION['language'] == 1)
{
    include($langs . 'ar.php'); // arabic language
    setcookie('language', 'ar', time() + (86400 * 30), "/"); 
}elseif($_SESSION['language'] == 2)
{
    include($langs . 'fr.php'); // french language
    setcookie('language', 'fr', time() + (86400 * 30), "/"); 
}
$function = 'includes/functions/'; // functions directory
@include($function . 'functions.php');



$status = array(
    '0'=>lang('nw'),
    '1'=>lang('lknw'),
    '2'=>lang('us'),
    '3'=>lang('vr')

);

$ext = array("jpeg",'jpg','png');
$lala = array(0=>'english',1=>'arabic',2=>'french');
?>