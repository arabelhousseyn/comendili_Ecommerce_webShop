<?php 
include('ini.php');

if(isset($_POST['print']))
{
    require_once 'pdf/vendor/autoload.php';

    $trans = $_POST['trans1'];
    $buyer = $_POST['name_by'];
    $qnt = $_POST['qnt1'];
    $payment = $_POST['payment1'];

    $stm = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
    $stm->execute(array($trans));
    $keys = $stm->fetch();
    /////////////////////////////////
    $stm1 = $con->prepare('SELECT * FROM items WHERE ID = ?');
    $stm1->execute(array($keys['id_product']));
    $data1 = $stm1->fetch();
    ////////////////////////////////////////////
    $stm2 = $con->prepare('SELECT * FROM membres WHERE ID = ?');
    $stm2->execute(array($keys['id_member']));
    $data2 = $stm2->fetch();
    
    $mpdf = new \Mpdf\Mpdf();
    $price = intval(str_replace('$','',$data1['price']));
    $price -= 100;
    strval($price);

    $data = '<div> N : ' . $trans .'</div>';
    $data .= '<div> buyer_name : ' . $buyer .'</div>';
    $data .= '<div> product_name : ' . $data1['name'] .'</div>';
    $data .= '<div> quantity : ' . $qnt .'</div>';
    $data .= '<div> email : ' . $data2['email'] .'</div>';
    $data .= '<div> adress : ' . $data2['adress_member'] .'</div>';
    $data .= '<div> price : ' . $price .'$</div>';
    $data .= '<div> thank you </div>';

// Write some HTML code:
$mpdf->WriteHTML($data);

// Output a PDF file directly to the browser
$mpdf->Output($trans . '_invoice.pdf','D');
}else{
    header('Location: index.php');
}

?>