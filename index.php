<?php
ob_start();
session_start();
$title = (isset($_GET['title'])) ? $title = $_GET['title'] : $title = 'comendili';
$sk = (isset($_GET['sk'])) ? $sk = $_GET['sk'] : $sk = 'comendili';
$dd = (isset($_GET['dd'])) ? $dd = $_GET['dd'] : $dd = '';
$ff = (isset($_GET['ff'])) ? $ff = $_GET['ff'] : $ff = '';
$langs = (isset($_GET['langs'])) ? $langs = $_GET['langs'] : $langs = '';
$trans = (isset($_GET['trans'])) ? $trans = $_GET['trans'] : $trans = '';

if(empty($_SESSION['username']))
{
	unset($_SESSION['username']);
}


filter_var($sk);
filter_var($dd);
filter_var($ff);
filter_var($title);
filter_var($trans);
filter_var($langs);
if(isset($_SESSION['search']))
{
	$ff= $_SESSION['search'];
$title = $sk . ' : ' . $ff;
} else{
	$title = $sk;
}
include('ini.php');
$ball = false;
	 $ball1 = false;
	 $ball2 = false;

	 $view = 'display:none;';

	 
	 //////////////// register
if(isset($_POST['register']))
{

	$name =  $_POST['addname'];
	$username = $_POST['adduser'];
	$email = $_POST['addemail'];
	$pass = $_POST['addpass1'];
	$ip = getUserIpAddr();
	$ph = strval($_POST['addphone']);
	 if($ph[0] == '0')
	 {
		 $ph =  substr($ph, 1);
	 }
	$phone = '213' . $ph;

	filter_var($name,FILTER_SANITIZE_STRING);
	filter_var($username,FILTER_SANITIZE_STRING);
	filter_var($email,FILTER_SANITIZE_EMAIL);
	filter_var($pass,FILTER_SANITIZE_STRING);
	filter_var($phone,FILTER_SANITIZE_STRING);
	$ip = strval($ip);
	

	$verifPhone = rand();
	$verifEmail = rand();
	$pass = sha1($pass);
	 
	if(empty(data($con,'SELECT * FROM membres')))
	{
		 $ball = true;
		 $ball1 = true;
		 $ball2 = true;
	}else{
		foreach (data($con,'SELECT * FROM membres') as  $value) {
			if($email == $value['email'])
			{
				$ball = false;
			break;
			} else{
				$ball = true;
			} 	
		}
	
		foreach (data($con,'SELECT * FROM membres') as  $value) {
			if($phone == $value['phone'])
			{
				$ball1 = false;
			break;
			} else{
				$ball1 = true;
			} 	
		}
	
		foreach (data($con,'SELECT * FROM membres') as  $value) {
			if($username == $value['username_member'])
			{
				$ball2 = false;
			break;
			} else{
				$ball2 = true;
			} 	
		}
	}
	
    

	 if($ball && $ball1 && $ball2)
	 {
		$stm = $con->prepare('INSERT INTO membres(name_member, username_member, email, phone, password, ip_membre, verif_number, verif_email) VALUES (?,?,?,?,?,?,?,?)');
		$stm->execute(array($name,$username,$email,$phone,$pass,$ip,$verifPhone,$verifEmail));
		$usrn ='eynuzi@yahoo.com';
	$hash = '2da92865383d710aeaf0e396b64b9c39';

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = 'comendili'; // This is who the message appears to be from.
	$numbers =  $ph; // A single number or a comma-seperated list of numbers
	$message = 'welcome';
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$usrn."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
	/////////////////////////////////////////////////
	  $to = $email;
		$subject = 'verification Account';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.'hocine.arab1@hotmail.com'.'<'.'hocine.arab1@hotmail.com'.'>' . "\r\n".'Reply-To: '.'hocine.arab1@hotmail.com'."\r\n" . 'X-Mailer: PHP/' . phpversion();
		$message = '<!doctype html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport"
						  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<title>Document</title>
				</head>
				<body>
				<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.'verification'.'</span>
					<div class="container">
					 '.'your verification code ' . $verifEmail.'<br/>
						Regards<br/>
					  '.'elhousseyn arab'.'
					</div>
				</body>
				</html>';
		$result = @mail($to, $subject, $message, $headers);

		header('Location: index.php?sk=success');
	 } else{
		 header('Location: index.php?sk=error'); 
	 }

    

}
///////////////// login

if(isset($_POST['login']))
{
	$switch = false;
	$switch2 = false;
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$pass = sha1($pass);

	filter_var($user,FILTER_SANITIZE_STRING);
	filter_var($pass,FILTER_SANITIZE_STRING);

	for ($i=0; $i <strlen($user) ; $i++){ 
		if($user[$i] == '@')
		{
			$switch = true;
			$switch2 = false;
		break;
		} else{
			$switch2= true;
		}
	}
	if($switch)
	{
		$data = data($con,'SELECT * FROM membres');

		foreach ($data as $value) {
			if($value['email'] == $user)
			{
			   if($value['password'] == $pass)
			   {
				   if($value['verif_email'] == 0)
				   {
					$_SESSION['id'] = $value['ID'];
					$_SESSION['email'] = $value['email'];
					$_SESSION['username'] = $value['username_member'];
					$_SESSION['langs'] = $value['langs'];
					header('Location: index.php');
				   } else{					   
                    header('Location: index.php?sk=verification&dd=' . $user . '&ff=' . $pass);
				   }
			   break;
			   }
			}
		}
	}

	if($switch2)
	{
		$data = data($con,'SELECT * FROM membres');

		foreach ($data as $value) {
			if($value['username_member'] == $user)
			{
			   if($value['password'] == $pass)
			   {
				if($value['verif_email'] == 0)
				{
				 $_SESSION['id'] = $value['ID'];
				 $_SESSION['email'] = $value['email'];
				 $_SESSION['username'] = $value['username_member'];
				 $_SESSION['langs'] = $value['langs'];
				 header('Location: index.php');
				} else{					   
				 header('Location: index.php?sk=verification&dd=' . $user . '&ff=' . $pass);
				}
			   break;
			   }
			}
		}

	}


}
/////////////////// verification code Email
if(isset($_POST['ver']))
{
	$do = false;
	$do2= false;
	$code = $_POST['code'];
	$em = $_POST['em'];
	$code = strval($code);
	 
	for ($i=0; $i <strlen($em) ; $i++) { 
		if($em[$i] == '@')
		{
			$do = true;
		break;
		}
	}
	if($do)
	{
		$stm = $con->prepare('SELECT * FROM membres WHERE email = ?');
	$stm->execute(array($em));
	$data = $stm->fetch();
	
	if($code == $data['verif_email'])
	{
	   $st = $con->prepare('UPDATE membres SET verif_email=? WHERE ID = ?');
	   $st->execute(array(0,$data['ID']));
	   header('Location: index.php?sk=success');
	} else{
		$view = 'display:block';
		$msg= lang('msgver');
	}
	}else{
		$stm = $con->prepare('SELECT * FROM membres WHERE username_member = ?');
	$stm->execute(array($em));
	$data = $stm->fetch();
	
	if($code == $data['verif_email'])
	{
	   $st = $con->prepare('UPDATE membres SET verif_email=? WHERE ID = ?');
	   $st->execute(array(0,$data['ID']));
	   header('Location: index.php?sk=success');
	} else{
		$view = 'display:block';
		$msg= lang('msgver');
	}
	}
	
}

///////////////// login1

if(isset($_POST['login1']))
{
	$switch = false;
	$switch2 = false;
	$user = $_POST['emailoruser'];
	$pass = $_POST['passuser2'];

	$pass = sha1($pass);

	filter_var($user,FILTER_SANITIZE_STRING);
	filter_var($pass,FILTER_SANITIZE_STRING);

	for ($i=0; $i <strlen($user) ; $i++){ 
		if($user[$i] == '@')
		{
			$switch = true;
			$switch2 = false;
		break;
		} else{
			$switch2= true;
		}
	}
	if($switch)
	{
		$data = data($con,'SELECT * FROM membres');

		foreach ($data as $value) {
			if($value['email'] == $user)
			{
			   if($value['password'] == $pass)
			   {
				   if($value['verif_email'] == 0)
				   {
					$_SESSION['id'] = $value['ID'];
					$_SESSION['email'] = $value['email'];
					$_SESSION['username'] = $value['username_member'];
					$_SESSION['langs'] = $value['langs'];
					header('Location: index.php');
				   } else{					   
                    header('Location: index.php?sk=verification&dd=' . $user . '&ff=' . $pass);
				   }
			   break;
			   }
			}
		}
	}

	if($switch2)
	{
		$data = data($con,'SELECT * FROM membres');

		foreach ($data as $value) {
			if($value['username_member'] == $user)
			{
			   if($value['password'] == $pass)
			   {
				if($value['verif_email'] == 0)
				{
				 $_SESSION['id'] = $value['ID'];
				 $_SESSION['email'] = $value['email'];
				 $_SESSION['username'] = $value['username_member'];
				 $_SESSION['langs'] = $value['langs'];
				 header('Location: index.php');
				} else{					   
				 header('Location: index.php?sk=verification&dd=' . $user . '&ff=' . $pass);
				}
			   break;
			   }
			}
		}

	}


}
///////////////////// verification number

if(isset($_POST['ver1']))
{
	$key = $_POST['keyup'];
	$code = $_POST['code1'];

	$stm = $con->prepare('SELECT * FROM membres WHERE ID = ?');
	$stm->execute(array($key));
	$dt = $stm->fetch();

	if($dt['verif_number'] == $code)
	{
	  $st = $con->prepare('UPDATE membres SET verif_number=? WHERE ID = ?');
	  $st->execute(array(0,$key));
	  header('Location: index.php?sk=settings');
	} else{
	   $view = 'display:block';
	   $msg = lang('msgver');
	}

}

//////////////////////// upload image
if(isset($_POST['upload']))
{
	$case = false;
	if(isset($_FILES['file']))
	{
		$file_name = $_FILES['file']['name'];
		$file_size =$_FILES['file']['size'];
		$file_tmp =$_FILES['file']['tmp_name'];
		$file_type=$_FILES['file']['type'];

		$file_type = str_replace('image/','',$file_type);
		$file_name = $_SESSION['id'] . '_profile.'. $file_type;
		
		foreach ($ext as  $value) {
			if($value == $file_type)
			{
				$case = true;
			break;
			} 
		}
		if($case)
		{
			if($file_size > 2097152){
				$view = 'display:block;';
		$type='danger';
		$msg  = 'the file has 20 MB please change it ';
				
			 } else{
				move_uploaded_file($file_tmp,$photos.$file_name);
				$stm = $con->prepare('UPDATE membres SET profile_picture=? WHERE ID = ?');
				$stm->execute(array($file_name,$_SESSION['id']));
						 }
		} else{
			$view = 'display:block;';
		$type='danger';
		$msg  = 'choose a valid picture';
		}

	}

	
	
}

///////////////////////// update member

if(isset($_POST['update']))
{
	require 'vendor/autoload.php';
	$nameup = $_POST['nameup'];
	$usernameup = $_POST['usernameup'];
	$emailup = $_POST['emailup'];
	$phoneup = $_POST['phoneup'];

	filter_var($nameup,FILTER_SANITIZE_STRING);
	filter_var($usernameup,FILTER_SANITIZE_STRING);
	filter_var($emailup,FILTER_SANITIZE_EMAIL);
	filter_var($phoneup,FILTER_SANITIZE_NUMBER_INT);

	$phoneup = '213' . strval($phoneup);

	$st = $con->prepare('SELECT * FROM membres WHERE ID = ?');
	$st->execute(array($_SESSION['id']));
	$dt = $st->fetch();

	if($dt['phone'] == $phoneup)
	{
		$view = 'display:block;';
		$type='danger';
		$msg  = 'this number alredy taken';
	} else{
		$verifPhone = rand();
		$stm = $con->prepare('UPDATE membres SET name_member=?,username_member=?,email=?,phone=?,verif_number=? WHERE ID = ?');
		$stm->execute(array($nameup,$usernameup,$emailup,$phoneup,$verifPhone,$_SESSION['id']));
		$MessageBird = new \MessageBird\Client('NUbhxJ5ewKQ33h7daS45S2pK9');
		  $Message = new \MessageBird\Objects\Message();
		  $Message->originator = 'comendili';
		  $Message->recipients = array(+intval($phone));
		  $Message->body = 'your verification code ' . $verifPhone;
	}

}
//////////////////// verif code of forgot password
if(isset($_POST['sendCode']))
{
	
	$view1 = '';
	$verifEmail = rand();
	$email = $_POST['emfor'];
	filter_var($email,FILTER_SANITIZE_EMAIL);
	
	$stm = $con->prepare('SELECT * FROM membres WHERE email = ? ');
	$stm->execute(array($email));
	$data = $stm->fetch();
	echo $data['ID'];
	if(@$data['ID'])
	{
		$_SESSION['prev1'] = $data['ID'];

		$st = $con->prepare('UPDATE membres SET otp=? WHERE ID = ?');

		$st->execute(array($verifEmail,$data['ID']));


		$to = $email;
		$subject = 'verification Account';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.'hocine.arab1@hotmail.com'.'<'.'hocine.arab1@hotmail.com'.'>' . "\r\n".'Reply-To: '.'hocine.arab1@hotmail.com'."\r\n" . 'X-Mailer: PHP/' . phpversion();
		$message = '<!doctype html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport"
						  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<title>Document</title>
				</head>
				<body>
				<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.'verification'.'</span>
					<div class="container">
					 '.'your verification code ' . $verifEmail.'<br/>
						Regards<br/>
					  '.'hocine.arab1@hotmail.com'.'
					</div>
				</body>
				</html>';
		$result = @mail($to, $subject, $message, $headers);
		header('Location: index.php?sk=forgot&dd=1');
 
    
	} else{
	 $view1='disabled';
	 $view = 'display:block;';
	 $msg = 'this email does not exist';
	}
	
}
//////////////////// confirm the code

if(isset($_POST['vercode']))
{
	$stm = $con->prepare('SELECT * FROM membres WHERE ID = ?');
	$stm->execute(array($_SESSION['prev1']));
	$dt = $stm->fetch();
	if($dt['otp'] == strval($_POST['codefor']))
	{
		$_SESSION['prev'] = $dt['ID'];

		header('Location: index.php?sk=forgot&dd=2');

	} else{
		$view = 'display:block;';
	 $msg = 'code is incorrect';
	}
}



///////////////////////// change password from forgot section


if(isset($_POST['vercode1']))
{
 $pass = $_POST['passtrd'];
 $pass1 = $_POST['passtrd1'];
 filter_var($pass,FILTER_SANITIZE_STRING);
 filter_var($pass1,FILTER_SANITIZE_STRING);
   
 if($pass == $pass1)
 {
	$pass1 =  sha1($pass1);
	$stm = $con->prepare('UPDATE membres SET password=? WHERE ID = ?');
	$stm->execute(array($pass1,$_SESSION['prev']));
	session_destroy();
	unset($_SESSION['prev']);
	unset($_SESSION['prev1']);
	header('Location: index.php?sk=success');
	
 } else{
	$view = 'display:block;';
	$msg = 'password does not mutch';
 }
  
}
///////////////////
if(isset($_POST['search']))
{
	$search  = $_POST['searchqr'];
   $_SESSION['search'] = $search;
   
   header('Location: index.php?sk=search&dd=' . $_POST['categories']);

}
//////////////////////
if(isset($_POST['min']))
{
  $_SESSION['qnt'] = $_POST['quantity'];


}
///////////////
if(isset($_POST['addadress']))
{
   $switch = $_POST['switch'];
   $tansaction = rand();
   if($switch == 'true')
   {
	$_SESSION['qnt'] = $_POST['getin'];
	$id_product = $_POST['idadress'];
	$name = $_POST['namedel'];
	$number = $_POST['numberdel'];
	$adress = $_POST['adressdel'];

	filter_var($name,FILTER_SANITIZE_STRING);
	filter_var($number,FILTER_SANITIZE_STRING);
	filter_var($adress,FILTER_SANITIZE_STRING);
   $number =  str_replace('0','',$number);
    $number = '213' . $number;
	$ff=0;
	
	//////// update the adress into members
	$stm = $con->prepare('UPDATE membres SET adress_member=? WHERE ID = ?');
	$stm->execute(array($adress,$_SESSION['id']));
	//////////////// insert into table
	$st = $con->prepare('INSERT INTO requests( id_member, id_product, qnt, name_buyer, mobile_buyer, transaction, statu) VALUES (?,?,?,?,?,?,?)');
	$st->execute(array($_SESSION['id'],$id_product,$_SESSION['qnt'],$name,$number,$tansaction,1));
	$_SESSION['trans'] = $tansaction;
	header('Location: index.php?sk=payment&trans=' . $_SESSION['trans'] . '&ff=' . $ff);
   } else{
	$id_product = $_POST['idadress'];
	$name = $_POST['namedel'];
	$number = $_POST['numberdel'];
	$adress = $_POST['adressdel'];
    
	filter_var($name,FILTER_SANITIZE_STRING);
	filter_var($number,FILTER_SANITIZE_STRING);
	filter_var($adress,FILTER_SANITIZE_STRING);
   $number =  str_replace('0','',$number);
    $number = '213' . $number;
	
	
	//////// update the adress into members
	$stm = $con->prepare('UPDATE membres SET adress_member=? WHERE ID = ?');
	$stm->execute(array($adress,$_SESSION['id']));
	//////////////// insert into table of requests
	$st = $con->prepare('INSERT INTO requests( id_member, id_product, qnt, name_buyer, mobile_buyer, transaction, statu) VALUES (?,?,?,?,?,?,?)');
	$st->execute(array($_SESSION['id'],$id_product,$_SESSION['qnt'],$name,$number,$tansaction,1));
	$_SESSION['trans'] = $tansaction;
	header('Location: index.php?sk=payment&trans=' . $_SESSION['trans'] . '&ff=' . $ff);

   }
	
}
//////////////////// select method payment

if(isset($_POST['selectmt']))
{
	if($_POST['selectmp'] == lang('ppl'))
	{
		$stm = $con->prepare('UPDATE requests SET payment=? WHERE transaction = ?');
		$stm->execute(array(0,$_SESSION['trans']));
		$_SESSION['method'] = 0;
		header('Location: index.php?sk=payment&trans=' . $_SESSION['trans'] . '&ff=1');
	    

	}elseif($_POST['selectmp'] == lang('post')) {
		$stm = $con->prepare('UPDATE requests SET payment=? WHERE transaction = ?');
		$stm->execute(array(1,$_SESSION['trans']));
		$_SESSION['method'] = 1;
		header('Location: index.php?sk=payment&trans=' . $_SESSION['trans'] . '&ff=1');

	} 
}
///////////////////// cancel

if(isset($_POST['can']))
{
$tra = $_POST['trranscan'];

$stm = $con->prepare('UPDATE requests SET statu= ? WHERE transaction = ?');
$stm->execute([2,$tra]);

}
////////////////// upload clip

if(isset($_POST['sendimg']))
{
	$case = false;
	$transa = $_POST['trans10'];
	if(isset($_FILES['selectclip']))
	{
		$file_name = $_FILES['selectclip']['name'];
		$file_size =$_FILES['selectclip']['size'];
		$file_tmp =$_FILES['selectclip']['tmp_name'];
		$file_type=$_FILES['selectclip']['type'];

		$file_type = str_replace('image/','',$file_type);
		$file_name = $transa .'_invoice.' . $file_type;
		
		foreach ($ext as  $value) {
			if($value == $file_type)
			{
				$case = true;
			break;
			} 
		}
		if($case)
		{
			if($file_size > 2097152){
				$view = 'display:block;';
		$type='danger';
		$msg  = 'the file has 20 MB please change it ';
				
			 } else{
				$st = $con->prepare('SELECT * FROM payment WHERE transaction_member = ?');
				$st->execute([$transa]);
				$done = $st->fetch();
				if(!empty($done['transaction_member']))
				{
					if($done['transaction_member'] == $transa)
					{
						$view = 'display:block;';
		$type='danger';
		$msg  = 'thank you you are alredy sent the clip';
					}else{
						move_uploaded_file($file_tmp,$clips.$file_name);
				$stm = $con->prepare('INSERT INTO payment( clip, transaction_member) VALUES (?,?)');
				$stm->execute(array($file_name,$transa));
					}

				}else{
					move_uploaded_file($file_tmp,$clips.$file_name);
				$stm = $con->prepare('INSERT INTO payment( clip, transaction_member) VALUES (?,?)');
				$stm->execute(array($file_name,$transa));
				}
				
			 }
		} else{
			$view = 'display:block;';
		$type='danger';
		$msg  = 'choose a valid picture';
		}

	}
}

if(isset($_POST['contact']))
{
	$name = $_POST['namecontact'];
	$email = $_POST['emailcontact'];
	$msg= $_POST['msgcontact'];

	filter_var($name,FILTER_SANITIZE_STRING);
	filter_var($email,FILTER_SANITIZE_EMAIL);
	filter_var($msg,FILTER_SANITIZE_STRING);

	$to = $email;
	$subject = 'contact';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: '.$email.'<'.$name.'>' . "\r\n".'Reply-To: '.$email."\r\n" . 'X-Mailer: PHP/' . phpversion();
	$message = '<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Document</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.'verification'.'</span>
				<div class="container">
				 '.'<p>' . $msg.'<p/>
				</div>
			</body>
			</html>';
	$result = @mail($to, $subject, $message, $headers);

}

include($tmpl  . 'header.php');
include($tmpl . 'modals.php');
include($tmpl . 'navbar.php');
include($tmpl . 'main.php');
include($tmpl . 'aside.php');
include($tmpl . 'footer.php');

ob_end_flush();