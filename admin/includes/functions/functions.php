<?php


function getTitle(){
    $title = (isset($_GET['sk'])) ? $title = $_GET['sk'] : $title = 'dashboard';
    return $title;
}

function redirect()
{
    echo '
    <div class="alert alert-success">
          '
          . lang('msg')
          .
           '
       </div>
       ';
       header( "refresh:3;url=index.php");
}

/*
this function come to count the number of columns into table 
his parameters 

countUsers($id,$table,$con)
$id = the id for each columns 
$table = the table that you want to retireve
$con = the connections database

 */
function countUsers($id,$table,$con)
{
    $count=$con->prepare("SELECT COUNT(ID) FROM users WHERE groupID = 0 ");
$count->execute();
 return $count->fetchColumn();
}
/*
this function come to count the number of columns into table for active does not activate
his parameters  

countActiveUsers($id,$table,$con)
$id = the id for each columns 
$table = the table that you want to retireve
$con = the connections database

 */

function countActiveUsers($id,$table,$con)
{
    $count=$con->prepare("SELECT COUNT(ID) FROM users WHERE groupID = 0 AND regStatus = 0");
$count->execute();
 return $count->fetchColumn();
}

function countget($con ,$namesTraitement,$display,$latest)
{
    $data = $con->query("SELECT * FROM users")->fetchAll();
    $j= 0 ;
     
     foreach ($data as  $row) {
        
            $namesTraitement += [$row['fullName'] => $row['ID']];
      
     }
   
  
    return $namesTraitement;
}

/*
this function can fetch the Id
*/

function retireveId($con,$stm,$prs)
{
    $sql = $stm;
    $stm = $con->prepare($sql);
    $stm->execute(array($prs));
    $data = $stm->fetch();

    return $data['ID'];
}


function countRow($con,$sql)
{
    $count=$con->prepare($sql);
$count->execute();
 return $count->rowCount();
}