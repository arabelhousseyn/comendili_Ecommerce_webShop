<?php 
ob_start();
session_start();
include('ini.php');
$namesTraitement = array();
$display = array();
$latest = 3;
// update member
$info = '';
$info1 = '';
$info2 = '';
$msg = '';
$statu = 'primary';
$disp = 'display:none;';
if(isset($_POST['update']))
{
   $id = $_POST['id'];
   $password = $_POST['password'];
   $email = $_POST['email'];
   $name = $_POST['name'];

   filter_var($password,FILTER_SANITIZE_STRING);
   filter_var($email,FILTER_SANITIZE_EMAIL);
   filter_var($name,FILTER_SANITIZE_STRING);
   $hash = sha1($password);
   $sql = 'SELECT  username,password,email,fullName FROM users WHERE username = ?';
   $stm = $con->prepare($sql);
   $stm->execute(array($_SESSION['usernm']));
   $row = $stm->fetch();
   $cnt = $stm->rowCount();
   if($cnt > 0)
   {
      if($hash == $row['password'])
      {
         $info = lang('taken');
         $statu = 'danger';
$disp = 'display:block;';
      }  else{
        $update = 'UPDATE users SET password=?,email=?,fullName=? WHERE ID = ?';
            $stm = $con->prepare($update);
           
           $stm->execute(array($hash,$email,$name,$id));
           $info = lang('up1');
           $statu = 'success';
          $disp = 'display:block;';
          session_destroy();
   unset($_SESSION['usernm']);
   @header("Location: index.php");
   exit();
           
           
      }
   }
 
}
///// add member
if(isset($_POST['addmem']))
{
   
   $ch = false;
   $ch2 = false;
   $ch3 = false;
   $usernames = array();
   $emails = array();
   $names = array();
   $user = $_POST['addusername'];
   $pass = $_POST['addpassword'];
   $em = $_POST['addemail'];
   $na = $_POST['addname'];
    
   filter_var($user,FILTER_SANITIZE_STRING);
   filter_var($pass,FILTER_SANITIZE_STRING);
   filter_var($em,FILTER_SANITIZE_EMAIL);
   filter_var($na,FILTER_SANITIZE_STRING);
   $sql = 'SELECT * FROM users';
   $stmt = $con->query($sql);
while ($row = $stmt->fetch()) {
    array_push($usernames,$row['username']);
    array_push($emails,$row['email']);
    array_push($names,$row['fullName']);

}
  for ($i=0; $i <count($usernames) ; $i++) { 
    if($usernames[$i] == $user)
    {
      $info = lang('taken3');
      $statu = 'danger';
$disp = 'display:block;';
    } else{
       $ch = true;
    break;
    }
     
  }

  for ($i=0; $i <count($emails) ; $i++) { 
   if($emails[$i] == $em)
   {
      $info1 = lang('taken1');
      $statu = 'danger';
$disp = 'display:block;';
   } else{
      $ch2 = true;
   break;
   }
    
 }

 for ($i=0; $i <count($names) ; $i++) { 
   if($names[$i] == $na)
   {
      $info2= lang('taken2');
      $statu = 'danger';
$disp = 'display:block;';
   } else{
      $ch3 = true;
   break;
   }
    
 }
 $msg = '<ul>' . '<li>' . $info . '</li>'
 . '<li>' . $info1 . '</li>'
 . '<li>' . $info2 . '</li>' .'<ul>';
 $ha = sha1($pass);

 if($ch && $ch2 && $ch3)
{
   $sql = 'INSERT INTO users( username, password, email, fullName, groupID, status, regStatus,date) VALUES (?,?,?,?,?,?,?,now())';
   $con->prepare($sql)->execute(array($user,$ha,$em,$na,0,0,0));
   $msg = lang('addsuc');
   $statu = 'success';
$disp = 'display:block;';


}

}

//////// update member from admin

if(isset($_POST['updatemem']))
{
   $th = false;
   $th1 = false;
   $th2 = false;
   $usernames1 = array();
   $emails1 = array();
   $names1 = array();
   $upuser = $_POST['updateuser'];
   $upemail = $_POST['updateemail'];
   $upname = $_POST['updatename'];
   $import = $_POST['updatekey'];

   filter_var($upuser,FILTER_SANITIZE_STRING);
   filter_var($upemail,FILTER_SANITIZE_EMAIL);
   filter_var($upname,FILTER_SANITIZE_STRING);

   $sql = 'SELECT * FROM users';
   $stmt = $con->query($sql);
while ($row = $stmt->fetch()) {
    array_push($usernames1,$row['username']);
    array_push($emails1,$row['email']);
    array_push($names1,$row['fullName']);
}
for ($i=0; $i <count($usernames1) ; $i++) { 
   if($usernames1[$i] == $upuser)
   {
     $info = lang('taken3');
     $statu = 'danger';
$disp = 'display:block;';
   } else{
      $th = true;
   break;
   }
    
 }

 for ($i=0; $i <count($emails1) ; $i++) { 
  if($emails1[$i] == $upemail)
  {
     $info1 = lang('taken1');
     $statu = 'danger';
$disp = 'display:block;';
  } else{
     $th1 = true;
  break;
  }
   
}

for ($i=0; $i <count($names1) ; $i++) { 
  if($names1[$i] == $upname)
  {
     $info2= lang('taken2');
     $statu = 'danger';
$disp = 'display:block;';
  } else{
     $th2 = true;
  break;
  }
   
}
$msg = '<ul>' . '<li>' . $info . '</li>'
. '<li>' . $info1 . '</li>'
. '<li>' . $info2 . '</li>' .'<ul>';
if($th && $th1 && $th2)
{
   $now = date("Y-m-d");
   $update = 'UPDATE users SET username=?,email=?,fullName=?,date = ? WHERE ID = ?';
            $stm = $con->prepare($update);
           
           $stm->execute(array($upuser,$upemail,$upname,$now,$import));
   $msg = lang('upsucc');
   redirect();
   $statu = 'success';
$disp = 'display:block;';


}

}

////////////// add categorie

if(isset($_POST['addcat']))
{
   $namedesc = $_POST['namedesc'];
   $desc = $_POST['desc'];
   $order = $_POST['order'];
   $operation = '';
   $operation1 = '';
   $operation2 = '';
    if(isset($_POST['operation']))
     {
      $operation = $_POST['operation'];
     }
     if(isset($_POST['operation1']))
     {
      $operation1 = $_POST['operation1'];
     }
     if(isset($_POST['operation2']))
     {
      $operation2 = $_POST['operation2'];
     }
     if(!empty($namedesc))
     {
        $sql = 'INSERT INTO categories(name, description, ordering, visible, comments, ads) VALUES (?,?,?,?,?,?)';

        $stm = $con->prepare($sql);
        $stm->execute(array($namedesc,$desc,$order,$operation,$operation1,$operation2));
        $info = lang('addcatsuc');
      $statu = 'success';
     $disp = 'display:block;';

     } else {
      $info = lang('please');
      $statu = 'danger';
     $disp = 'display:block;';
     }
}
//////////// update categorie

if(isset($_POST['upcat']))
{
   $upop='';
   $upop1 = '';
   $upop2 = '';
  $id = @$_POST['upid'];
  $upname = @$_POST['upname'];
  $updesc = @$_POST['updesc'];
  $uporder = @$_POST['uporder'];
  if(isset($_POST['upop']))
  {
     @$upop = @$_POST['upop'];
  }

  if(isset($_POST['upop1']))
  {
     @$upop1 = @$_POST['upop1'];
  }

  if(isset($_POST['upop2']))
  {
     @$upop2 = @$_POST['upop2'];
  }
  if(strlen($updesc) == '<br>' || strlen($uporder) !==0)
  {
   $sql = 'UPDATE categories SET name=?,description=?,ordering=?,visible=?,comments=?,ads=? WHERE ID = ?';
   $stt = $con->prepare($sql);
   $stt->execute(array($upname,$updesc,$uporder,$upop,$upop1,$upop2,$id));
   $info = lang('upcatmessage');
   $statu = 'success';
  $disp = 'display:block;';
  } else{
   $info = lang('upcaterror');
   $statu = 'danger';
  $disp = 'display:block;';

  }
  
}
/////////////// add item
if(isset($_POST['addit']))
{
   $nameit = $_POST['addnameit'];
   $descit = $_POST['descit'];
   $priceit = $_POST['priceit'];
   $country = $_POST['addcountry'];
   $stat = $_POST['addstatus'];
   $mem = $_POST['memberit'];
   $cat = $_POST['catit'];
   if(strlen($nameit) == 0 )
   {
      $info = 'please entrer the name information';
      $statu = 'danger';
     $disp = 'display:block;';
   } else{
      if(strlen($descit) == 0)
      {
         $info += 'please entrer the description information';
   $statu = 'danger';
  $disp = 'display:block;';
      } else{
         if(strlen($priceit) == 0)
         {
            $info += 'please entrer the price';
   $statu = 'danger';
  $disp = 'display:block;';

         } else{
            try {
              $prcieit = doubleval($priceit);
            } catch (\Throwable $th) {
               $info += 'invalid price';
   $statu = 'danger';
  $disp = 'display:block;';
            }
            $priceit = strval($priceit);
            if(strlen($country) == 0)
            {
               $info += 'please choose the country';
   $statu = 'danger';
  $disp = 'display:block;';
            } else{
               if(strlen($stat) == 0)
               {
                  $info += 'please choose the statu';
   $statu = 'danger';
  $disp = 'display:block;';
               } else{
                  if(strlen($mem) == 0)
                  {
                     $info += 'please choose a member';
   $statu = 'danger';
  $disp = 'display:block;';
                  } else{
                     if(strlen($cat) == 0)
                     {
                        $info += 'please choose a category';
   $statu = 'danger';
  $disp = 'display:block;';
                     } else{
                        foreach ($status as $key => $value) {
                           if($value == $stat)
                           {
                              $stat = $key;
                           break;
                           }
                        }
                        $idcat = retireveId($con,'SELECT ID FROM categories WHERE name = ?',$cat);
                        $idmem =retireveId($con,'SELECT ID FROM users WHERE fullName = ?',$mem);
                        
                        $sql = 'INSERT INTO items(name, description, price, date, country, status, rating, cat_id, member_id) VALUES (?,?,?,now(),?,?,?,?,?)';
                        $st = $con->prepare($sql);
                        $st->execute(array($nameit,$descit,$priceit .'$',$country,$stat,0,$idcat,$idmem));
                        $info = lang('vaddit');
                        $statu = 'success';
                       $disp = 'display:block;';

                     }
                  }
               }
            }
         }
         
      }
   }
}
////////// add photo section

if(isset($_POST['addphoto']))
{
   $stt = '';
   $id = $_POST['idphoto'];
   $fuck = false;
   if(isset($_FILES['image'])) {
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      for ($i=0; $i <strlen($file_type) ; $i++) { 
         if($file_type[$i] == '/')
         {
         break;
         } 
      }
      $file_type = str_replace(substr($file_type, 0, $i). '/','',$file_type);
      $file_name = $id . '-item.' . $file_type;
      foreach ($ext as  $value) {
         if($value == $file_type)
         {
            $fuck = true;
         break;
         }
      }
      if($fuck)
      {
         if($file_size > 10097152)
         {
          $disp = 'display:block;';
         $detox = 'the size of the photo must not be under 10 mb choose another photo';
         } else{
            move_uploaded_file($file_tmp,$photos.$file_name);
            $sql='UPDATE items SET image=? WHERE ID = ?';
            $stm = $con->prepare($sql);
            $stm->execute(array($file_name,$id));
         }

      } else{
         $disp = 'display:block;';
         $detox = lang('selphoto');
      }
    }
    
}
  
/////// delete photo section

if(isset($_POST['deletephoto']))
{
   /////////// to get the file name from the mysql
   $id = $_POST['idphoto1'];
   $gets = 'SELECT image FROM items WHERE ID = ?';

   $sta = $con->prepare($gets);
   $sta->execute(array($id));
   $dt = $sta->fetch();

   /////////////////////////////// to remove from mysql and folder

   if($dt['image'] !== '')
   {
      if(file_exists($photos . $dt['image']))
      {
         $sql='UPDATE items SET image=? WHERE ID = ?';
      $stm = $con->prepare($sql);
      $stm->execute(array('',$id));
      unlink($photos . $dt['image']);
      } else{
         $disp = 'display:block;';
     $detox = 'please check if photo exist on folder';
      }
   }  else{
     $disp = 'display:block;';
     $detox = 'please select a photo';
   }
}

/////////////////////////  update item

if(isset($_POST['it']))
{
   $tdid = $_POST['idupitem'];
   $nameit = $_POST['upnameit'];
   $descit = $_POST['updescit'];
   $priceit = $_POST['uppriceit'];
   $country = $_POST['upcountry'];
   $stat = $_POST['upstat'];
   $mem = $_POST['upmember'];
   $cat = $_POST['upcat'];
   if(strlen($nameit) == 0 )
   {
      $info = 'please entrer the name information';
      $statu = 'danger';
     $disp = 'display:block;';
   } else{
      if(strlen($descit) == 0)
      {
         $info += 'please entrer the description information';
   $statu = 'danger';
  $disp = 'display:block;';
      } else{
         if(strlen($priceit) == 0)
         {
            $info += 'please entrer the price';
   $statu = 'danger';
  $disp = 'display:block;';

         } else{
            try {
              $prcieit = doubleval($priceit);
            } catch (\Throwable $th) {
               $info += 'invalid price';
   $statu = 'danger';
  $disp = 'display:block;';
            }
            $priceit = strval($priceit);
            if(strlen($country) == 0)
            {
               $info += 'please choose the country';
   $statu = 'danger';
  $disp = 'display:block;';
            } else{
               if(strlen($stat) == 0)
               {
                  $info += 'please choose the statu';
   $statu = 'danger';
  $disp = 'display:block;';
               } else{
                  if(strlen($mem) == 0)
                  {
                     $info += 'please choose a member';
   $statu = 'danger';
  $disp = 'display:block;';
                  } else{
                     if(strlen($cat) == 0)
                     {
                        $info += 'please choose a category';
   $statu = 'danger';
  $disp = 'display:block;';
                     } else{
                        foreach ($status as $key => $value) {
                           if($value == $stat)
                           {
                              $stat = $key;
                           break;
                           }
                        }
                        $idcat = retireveId($con,'SELECT ID FROM categories WHERE name = ?',$cat);
                        $idmem =retireveId($con,'SELECT ID FROM users WHERE fullName = ?',$mem);
                        
                        $sql = 'UPDATE items SET name=?,description=?,price=?,date=?,country=?,status=?,cat_id=?,member_id=? WHERE ID = ?';
                        $st = $con->prepare($sql);
                        $today = date("Y/m/d");
                        $st->execute(array($nameit,$descit,$priceit,$today,$country,$stat,$idcat,$idmem,$tdid));
                        $info = 'item updates succesfully';
                        $statu = 'success';
                       $disp = 'display:block;';

                     }
                  }
               }
            }
         }
         
      }
   }
}
//////////////// update comment
if(isset($_POST['updatecomment']))
{
   $key = $_POST['upitkey'];
   $comment = $_POST['commentup'];
   $dateit = $_POST['dateit'];

   filter_var($comment,FILTER_SANITIZE_STRING);
   filter_var($dateit,FILTER_SANITIZE_STRING);
   
   if(strlen($comment) == 0 || strlen($dateit) == 0)
   {$statu = 'danger';
      $disp = 'display:block;';
      $msg = 'please fill all';

   } else{
      $stm = $con->prepare('UPDATE comments SET comment=?,comment_date=? WHERE id = ?');
      $stm->execute(array($comment,$dateit,$key));
      $statu = 'success';
      $disp = 'display:block;';
      $msg = lang('up1');
   }
   
}

$title = '';
if(isset($_POST['logout']))
{
   
   session_destroy();
   unset($_SESSION['usernm']);
   header("Location: index.php");
   exit();
}

if(!isset($_SESSION['usernm']))
{
   header("Location: index.php");
   exit();
}
getTitle(); 
include($tmpl . 'header.php');
include($tmpl . 'navbar.php');
include($tmpl . 'main.php');
include($tmpl . 'footer.php');

ob_end_flush();
?>