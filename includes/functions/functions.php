<?php
/////////////////// retrive IP
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


////////////////////// retrieve data


function data($con,$sql)
{
    $stm = $con->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll();
    return $data;
}

/////////////////// redirect function


function redirect($url)
{echo '<div class="container">
	<div class="alert alert-danger" style="margin-top: 50px;padding: 10px 0 10px 50px;">
	 this page is not available you will be redirect in 3 seconds
	</div>
	</div>';
    header( "refresh:3;url=" . $url);
}

