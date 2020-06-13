<?php

require 'ini.php';
$tr = (isset($_GET['tr'])) ? $tr = $_GET['tr'] : $tr = '';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$stm = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
$stm->execute(array($tr));
$data = $stm->fetch();
if($tr == @$data['transaction'])
{
    $st= $con->prepare('SELECT * FROM items WHERE ID = ?');
    $st->execute(array($data['id_product']));
    $data1 = $st->fetch();
    $price = $data1['price'];
    $price = intval($price);
    $price +=2;
///////////// payer
$payer = new Payer();
$payer->setPaymentMethod("paypal");


/////////////////// items

$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setSku("123123") // Similar to `item_number` in Classic API
    ->setPrice(7.5);


$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

//////////////// ship
$details = new Details();
$details->setShipping(1.2)
    ->setTax(1.3)
    ->setSubtotal(17.50);

    //////////////// amount
    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal(20)
        ->setDetails($details);

    ///////////////// transaction

    $transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());
    //////////////// url
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/learn%20php/comendili/index.php?sk=payment.php&ff=success")
    ->setCancelUrl("http://localhost/learn%20php/comendili/index.php?sk=payment.php&ff=error");
    ////// payment
    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

        try {
            $payment->create($api);
        } catch (Exception $ex) {
           header('Location: index.php?sk=payment.php&ff=error');
            exit(1);
        }
        
        foreach ($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url')
            {
                $redirectUrls = $link->getHref();
            }
        }
        header('Location:' .$redirectUrls);

    
}else{
    echo 'no';
}



?>