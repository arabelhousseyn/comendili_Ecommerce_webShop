<?php
include('admin/db.php');  // database connection
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
$custom = 'layout/v1/'; // custom path
$tmpl = 'includes/templates/v1/'; //custom path
$css = $custom . 'css/'; //css path
$js = $custom . 'js/'; //js path
$photos = 'admin/data/up/'; // photos path
$clips = 'admin/data/invoices/'; // invoice path
$fonts = $custom . 'fonts/'; // fonts path
$img = $custom . 'images/'; // images path
$langs = 'includes/langs/'; ///////////// languages path

if(isset($_GET['langs']))
{
    $st = $con->prepare('UPDATE membres SET langs=? WHERE ID = ?');
    if(is_numeric($_GET['langs']))
    {
        if($_GET['langs'] == 0)
    {
        $st->execute(array($_GET['langs'],$_SESSION['id']));
        $_SESSION['langs'] = $_GET['langs'];

    }elseif($_GET['langs'] == 1)
    {
        $st->execute(array($_GET['langs'],$_SESSION['id']));
        $_SESSION['langs'] = $_GET['langs'];
    }elseif($_GET['langs'] == 2)
    {
        $st->execute(array($_GET['langs'],$_SESSION['id']));
        $_SESSION['langs'] = $_GET['langs'];
    }
    }
}

if(isset($_SESSION['username']))
{
    if(@$_SESSION['langs'] == 0)
{
    include($langs . 'en.php'); /// english language 
}elseif($_SESSION['langs'] == 1)
{
    include($langs . 'ar.php'); // arabic language 
}elseif($_SESSION['langs'] == 2)
{
    include($langs . 'fr.php'); // french language
}
}else{
    include($langs . 'en.php'); 
}


$function = 'includes/functions/'; // functions directory
@include($function . 'functions.php');

require 'php_paypal/autoload.php';

$api = new ApiContext(
    new OAuthTokenCredential(
        'AVSDc7izBC4fuqegqGUeVReY-5DZuNd0QwNdw2OTWPNLlsN_47CSM0WT29RYpOlJl7O0lyDbDdrYHKNr',
        'EM2By6SAnaGpayKz6iHmp1pjLtEvD7eaSEu2mkYvHnG-g21XbfBbqgDrrQsy5GivIZ3-RLKPBqmSIJdm'
    )
);
$api->setConfig([
    'mode' => 'sandbox',
    'http.ConnectionTimeOut'=>30,
    'log.LogEnabled'=>false,
    'log.FileName'=>'',
    'log.LogLevel'=>'FINE',
    'validation.level'=>'log'
]);
use PayPal\Api\Payer;




$status = array(
    '0'=>lang('nw'),
    '1'=>lang('lknw'),
    '2'=>lang('us'),
    '3'=>lang('vr')

);

$ext = array("jpeg",'jpg','png');
$lala = array(0=>'english',1=>'arabic',2=>'french');

?>