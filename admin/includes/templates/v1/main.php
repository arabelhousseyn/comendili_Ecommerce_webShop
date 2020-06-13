<?php  
$change = (isset($_GET['sk'])) ? $change = $_GET['sk'] : $change= 'default';
$tf = (isset($_GET['tf'])) ? $tf = $_GET['tf'] : $tf = 'none';
 $bts = (isset($_GET['bts'])) ? $bts = $_GET['bts'] : $bts = 'none';

if($change == 'default')
{
    ?>
    <div class="board">
    <div class="container-fluid text-center">
    <h1 class="mt-4"><?php echo lang('dash');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo lang('dash');?></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?php echo lang('total');?>
                                </div>
                                <span><?php echo countUsers('ID','users',$con);?></span>
                                
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard.php?sk=members"><?php echo lang('details');?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><?php echo lang('pending');?> 
                                    </div>
                                    <span><?php echo countActiveUsers('ID','users',$con);?></span>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard.php?sk=members&edit=pending"><?php echo lang('details');?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                   
                                    <div class="card-body"><?php echo lang('totit');?></div>
                                    <span><?php echo countRow($con,'SELECT * FROM items');?></span>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard.php?sk=items"><?php echo lang('details');?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><?php echo lang('totco');?>
                                    </div>
                                    <span><?php echo countRow($con,'SELECT * FROM comments');?></span>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard.php?sk=comments"><?php echo lang('details');?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    </div>
    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="card">
  <h5 class="card-header h5"><i class='fa fa-users'></i> <?php echo lang('lts') . $latest;?></h5>
  <div class="card-body">
    <p class="card-text">
    
        <table class="table table-striped">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
    countget($con,$namesTraitement,$display,$latest);
    $keys = array_keys(countget($con,$namesTraitement,$display,$latest));
   
    for ($i=count(countget($con,$namesTraitement,$display,$latest))-1; $i >=0 ; $i--) { 
        /*echo $keys[$i] . ' ' . countget($con,$namesTraitement,$display,$latest)[$keys[$i]];*/
         
        ?>
        <tr>
        
        <td>
        <?php echo '<h5>' .  $keys[$i] . '</h5>';?>
        </td>
        <td>
        <?php  
        $done = countget($con,$namesTraitement,$display,$latest)[$keys[$i]];
        $sql = 'SELECT * FROM users WHERE ID = ?';
        $ch = $con->prepare($sql);
        $ch->execute(array($done));
        $ra = $ch->fetch();
        $cntt = $ch->rowCount();
      
        if($cntt > 0)
        {
            if($ra['regStatus'] == 0)
            {
                ?>
             <a style='float:right; margin:0 10px;'  href="dashboard.php?sk=members&edit=ed&rs=<?php echo countget($con,$namesTraitement,$display,$latest)[$keys[$i]];?>" class='btn btn-success btn-sm'><?php echo lang('edit');?></a>
              <a style='float:right;' href="dashboard.php?sk=members&edit=pen&rs=<?php echo countget($con,$namesTraitement,$display,$latest)[$keys[$i]];?>" class='btn btn-primary btn-sm'><?php echo lang('activate');?></a>
                <?php
            } else{
                ?>
                 <a style='float:right;' href="dashboard.php?sk=members&edit=ed&rs=<?php echo countget($con,$namesTraitement,$display,$latest)[$keys[$i]];?>" class='btn btn-success btn-sm'><?php echo lang('edit');?></a>
                <?php
            }
        }
        ?>

        </td>
        <?php
        if($i == count(countget($con,$namesTraitement,$display,$latest))-$latest)
        {
        break;
        }
    }
    
   
    
    ?>
        </tr>
        </tbody>
        
        </table>
        
        
    <a href="dashboard.php?sk=members"><?php echo lang('view');?></a>
    
    </p>
  </div>
</div>
                </div>

                <div class="col-md-6">
                <div class="card">
  <h5 class="card-header h5"><i class='fa fa-tag'></i> <?php echo lang('ltsi');?> <span style='float:right;'><button  id='tog'><i id='icoo' class='fa fa-plus'></i></button></span></h5>
  <div class="card-body">
   <?php
   $sq = 'SELECT * FROM items';
   $st = $con->prepare($sq);
   $st->execute();
   $dt = $st->fetchAll();
   ?>
   
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
                      
                    <?php
                    foreach ($dt as $vl) {
                   
                      ?>
                    <tr>
                      <td>
                          <?php if(strlen($vl['name']) !== 0)
                          {
                            echo '<span style="font-weight:bold;color: #90a3fd;">' .lang('namecat'). '</span>' .  '<h3>' . $vl['name'] . '</h3>';
                         
                          } else{
                              echo 'no data available';
                          }
                         echo '<div class="slid">';

                          if(strlen($vl['description']) !== 0)
                          {
                            echo '<span style="font-weight:bold;color: #90a3fd;">' .lang('descc'). '</span>' .  '<h3>' . $vl['description'] . '</h3>';
                         
                          } else{
                              echo 'no data available';
                          }
                          if(strlen($vl['price']) !== 0)
                          {
                            echo '<span style="font-weight:bold;color: #90a3fd;">' .lang('pr'). '</span>' .  '<h3>' . $vl['price'] . '</h3>';
                         
                          } else{
                              echo 'no data available';
                          }
                          if(strlen($vl['image']) !== 0)
                          {
                           ?>
                           <img style='height: 250px;width: 300px;' src="<?php echo $photos . $vl['image'];?>" alt="this is a photo">
                           <?php
                         
                          } else{
                              echo 'no data available';
                          }
                          echo '</div>';
                          
                           ?>
                      </td>
                      
                    </tr>
                <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    <p class="card-text">
    </p>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <?php
} elseif($change == 'categories')
{
    
    if($tf == 'add')
    {
    ?>
    <div class="container">
   <div class="row">
  <!-- Material form contact -->
<div class="card col-md-12 col-lg-12">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('addcat');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='post' style="color: #757575;" >

        <!-- Name -->
        <div class="md-form mt-3">
            <input type="text" id="namedesc" name='namedesc' class="form-control" required>
            <label for="namedesc"><?php echo lang('namecat');?></label>
            <span id='validatenamedesc'></span>
        </div>

        <!--description-->
        <label for="desc"><?php echo lang('desc');?></label>
        <div class="md-form">
        
            <textarea id="desc" name='desc' class="form-control md-textarea content" rows="3"></textarea>
            
            <span id='validatedesc'></span>
        </div>

        <!-- ordering -->
        <div class="md-form mt-3">
            <input type="text" id="order" name='order' class="form-control">
            <label for="order"><?php echo lang('order');?></label>
            <span id='validateorder'></span>
        </div>
        
        <!-- visible -->
        <label for="yesvis"><?php echo lang('visible');?></label>
        <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yesvis" value='0' name="operation">
  <label class="custom-control-label" for="yesvis"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="novis" value='1' name="operation">
  <label class="custom-control-label" for="novis"><?php echo lang('n');?></label>
</div>
<br>
<!-- comments -->
<label for="yescom"><?php echo lang('com');?></label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yescom" value='0' name="operation1">
  <label class="custom-control-label" for="yescom"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="nocom" value='1' name="operation1">
  <label class="custom-control-label" for="nocom"><?php echo lang('n');?></label>
</div>
<br>
<!-- Ads -->
<label for="yesads"><?php echo lang('ads');?></label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yesads" value='0' name="operation2">
  <label class="custom-control-label" for="yesads"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="noads" value='1' name="operation2">
  <label class="custom-control-label" for="noads"><?php echo lang('n');?></label>
</div>
<!-- alert informarion -->
<div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'>
       <?php echo $info;?>
       </div>
 <!-- check-->
 <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkcat" name='checkcat'>
                  <label class="custom-control-label" for="checkcat"><?php echo lang('con');?></label>
              </div>


        <!-- Send button -->
        <input type="submit" value="<?php echo lang('addca');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" name='addcat' id='addcat'>

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>

    
  
  <?php
    }elseif($tf == 'none')
    {
        $order = (isset($_GET['order'])) ? $order = $_GET['order'] : $order = 'ASC';
        
        ?>
       <!--  -->
       <div class="container">
       <div class="box" style='margin:100px;'>
       <h1 class='text-center'><?php echo lang('mancat');?></h1>
       <a href="dashboard.php?sk=categories&tf=add" class='text-center btn btn-primary' style='margin-left: 50px;'><?php echo lang('addca');?></a>
       <div class="card" style='margin:50px;'>

  <div class="card-header">
  <div class='pull-right'><?php echo lang('mancat');?> <div style='float:right;'>
  <?php echo lang('order');?> : <a style='<?php if($order == 'ASC'){echo 'color:red;';}else{echo 'color:black;';}?> text-decoration:none;' href="dashboard.php?sk=categories&order=ASC"><span><?php echo lang('asc');?></span></a> &nbsp; <span style='border-right:1px solid black;'></span> &nbsp;  <a href="dashboard.php?sk=categories&order=DESC"  style='<?php if($order == 'DESC'){echo 'color:red;';}else{echo 'color:black;';}?> text-decoration:none;'><span><?php echo lang('desc');?></span></a>
 &nbsp; <?php echo lang('vw');?> : <button style='outline:none;' id='full' class='tgt activeFull'><?php echo lang('full');?></button>&nbsp; <span style='border-right:2px solid black;'></span> &nbsp; <button style='outline:none;' id='classic' class='tgt activeClassic'><?php echo lang('classic');?></button>
  </div></div>
  </div>
  <div class="card-body table-responsive">
  
      <table class='table table-striped' id="dataTable1" width="100%" cellspacing="0">
     
    
    <tbody>
    <?php
    if($order == 'ASC')
    {
        $sql='SELECT * FROM categories ORDER BY ordering ASC';
    }else{
        $sql='SELECT * FROM categories ORDER BY ordering DESC';  
    }
  
  $data = $con->query($sql)->fetchAll();

  foreach ($data as  $value) {
      ?>
    <tr>
    <td class='product'>
    <div id="name"><h1><?php echo $value['name'];?></h1></div>
    <div class="btns" >
    <a href="dashboard.php?sk=categories&tf=update&bts=<?php echo $value['ID'];?>"  class='btn btn-primary'><?php echo lang('edit');?></a>
    <a href="dashboard.php?sk=categories&tf=delete&bts=<?php echo $value['ID'];?>" class='btn btn-danger'><?php echo lang('del');?></a>
    </div>
    <div class="all">
    <h2><?php echo $value['description'];?></h2>
   
    <div class="badges" style='display:flex;'>
    <?php
    if($value['visible'] == 1)
    {
        ?>
        <h4><span class="badge badge-pill badge-warning"> <i class='fa fa-eye'></i> hidden</span></h4>
        <?php
    }
    
    ?>
    <?php
    if($value['comments'] == 1)
    {
        ?>
        <h4><span class="badge badge-pill badge-primary">comments disabled</span></h4>
        <?php
    }
    
    ?>

<?php
    if($value['ads'] == 1)
    {
        ?>
        <h4><span class="badge badge-pill badge-danger">ads disabled</span></h4>
        <?php
    }
    
    ?>
    </div>
    </div>
    

    </td>
    </tr>
    
    
    <?php
}
  ?>
    </tbody>
    </table>
  </div>
       </div>
</div>
       </div>
      
    

        <?php
    }elseif($tf == 'update')
    {

        $sql = 'SELECT name, description, ordering, visible, comments, ads FROM categories WHERE ID = ?';
        $state = $con->prepare($sql);
    $state->execute(array($bts));
   

        $state = $state->fetch();
        if(@strlen($state['name']) > 0)
        {
            ?>
            <div class="container">
   <div class="row">
  <!-- Material form contact -->
<div class="card col-md-12 col-lg-12">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('upcat');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='post' style="color: #757575;" >
    <input type="hidden" name="upid" value='<?php echo $bts;?>'>

        <!-- Name -->
        <div class="md-form mt-3">
            <input type="text" id="upname" name='upname' class="form-control" value='<?php echo $state['name'];?>' required>
            <label for="upname"><?php echo lang('namecat');?></label>
            <span id='validateup'></span>
        </div>

        <!--description-->
        <label for="desc"><?php echo lang('desc');?></label>
        <div class="md-form">
        
            <textarea id="updesc" name='updesc' class="form-control md-textarea content" value='<?php echo $state['description'];?>' rows="3"></textarea>
        </div>

        <!-- ordering -->
        <div class="md-form mt-3">
            <input type="text" id="uporder" name='uporder' value='<?php echo $state['ordering'];?>' class="form-control">
            <label for="uporder"><?php echo lang('order');?></label>
            <span id='validateupor'></span>
        </div>
        
        <!-- visible -->
        
        <label for="yesvis"><?php echo lang('visible');?></label>
        <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yesvis" value='0' name="upop" <?php 
  if($state['visible'] == 0)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="yesvis"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="novis" value='1' name="upop" <?php 
  if($state['visible'] == 1)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="novis"><?php echo lang('n');?></label>
</div>

<br>
<!-- comments -->
<label for="yescom"><?php echo lang('com');?></label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yescom" value='0' name="upop1" <?php 
  if($state['comments'] == 0)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="yescom"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="nocom" value='1' name="upop1" 
  <?php 
  if($state['comments'] == 1)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="nocom"><?php echo lang('n');?></label>
</div>
<br>
<!-- Ads -->
<label for="yesads"><?php echo lang('ads');?></label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="yesads" value='0' name="upop2" <?php 
  if($state['ads'] == 0)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="yesads"><?php echo lang('y');?></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="noads" value='1' name="upop2" <?php 
  if($state['ads'] == 1)
  {
     echo 'checked';
  }
  ?>>
  <label class="custom-control-label" for="noads"><?php echo lang('n');?></label>
</div>
<!-- alert informarion -->
<div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'>
       <?php echo $info;?>
       </div>
 <!-- check-->
 <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkup" name='checkup'>
                  <label class="custom-control-label" for="checkup"><?php echo lang('con');?></label>
              </div>


        <!-- Send button -->
        <input type="submit" value="<?php echo lang('addca');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" name='upcat' id='upcat'>

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>
            <?php
        
        
} else {
    echo '<div class="alert alert-danger">' . lang('avb') . '</div>';
    redirect();
}

?>

        <?php
    } elseif($tf == 'delete')
    {
        $sql = 'DELETE FROM categories WHERE ID = ?';
        $sr = $con->prepare($sql);
        $sr->execute(array($bts));
        ?>
        <div class="alert alert-success">
        <?php echo lang('delcat');?>
        </div>
        
        
        <?php
        redirect();
    } 
}elseif($change == 'items') {
    $it = (isset($_GET['it'])) ? $it = $_GET['it'] : $it = 'none';
    $id = isset($_GET['id']) ? $id = $_GET['id'] : $id = 'none';  
    if($it == 'add')
    {
    ?>
<div class="container">
   <div class="row">
  <!-- Material form contact -->
<div class="card col-md-12 col-lg-12">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('addit');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='post' style="color: #757575;" >
    

        <!-- Name -->
        <div class="md-form mt-3">
            <input type="text" id="addnameit" name='addnameit' class="form-control"  required>
            <label for="addnameit"><?php echo lang('namecat');?></label>
            <span id='validateNameIt'></span>
        </div>

        <!--description-->
        <label for="descit"><?php echo lang('descc');?></label>
        <div class="md-form">
 <textarea id="descit" name='descit' class="form-control md-textarea content"  rows="3"></textarea>
        </div>
        <!-- price -->
        <div class="md-form mt-3">
            <input type="text" id="priceit" name='priceit' class="form-control"  required>
            <label for="priceit"><?php echo lang('pr');?></label>
            <span id='validatePriceIt'></span>
        </div>
        <!-- Country -->
        <label for="addcountry"><?php echo lang('cntr');?></label>
    <select class="form-control" id="addcountry" name='addcountry'>
    <option disabled selected><?php echo lang('chcntr');?></option>
    <?php 
    foreach ($pays as $key => $value) {
        ?>
         <option value='<?php echo $value;?>'><?php echo $value;?></option>
        <?php
    }
    
    
    ?>
     
    </select>

    <!-- status -->
    <label for="addstatus"><?php echo lang('st');?></label>
    <select class="form-control" id="addstatus" name='addstatus'>
    <option disabled selected><?php echo lang('chst');?></option>
    <?php 
    foreach ($status as $key => $value) {
        ?>
         <option value='<?php echo $value;?>'><?php echo $value;?></option>
        <?php
    }
    
    
    ?>
     
    </select>

    <!-- member -->
    <label for="memberit"><?php echo lang('memsin');?></label>
    <select class="form-control" id="memberit" name='memberit'>
    <option disabled selected>...</option>
    <?php 
    $sql='SELECT * FROM users';
    $st = $con->prepare($sql);
    $st->execute();
    $data = $st->fetchAll();
    foreach ($data as  $value) {
     
        ?>
         <option value="<?php echo $value['fullName'];?>"><?php echo $value['fullName'];?></option>
        <?php
  
}
    
    ?>
     
    </select>

    <!-- category -->
    <label for="catit"><?php echo lang('cat');?></label>
    <select class="form-control" id="catit" name='catit'>
    <?php 
   $st = $con->prepare('SELECT * FROM categories');
   $st->execute();
   $data = $st->fetchAll();
    foreach ($data as  $value) {
     
        ?>
         <option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
        <?php
  
}
    
    ?>
     
    </select>

        
<!-- alert informarion -->
<div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'>
       <?php echo $info;?>
       </div>


        <!-- Send button -->
        <input type="submit" value="<?php echo lang('addit');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" name='addit' id='addit'>

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>
    
    <?php
    } else if($it == 'none')
    {
        ?>
        <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('It');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?php echo lang('It');?></li>
                        </ol>
                        <a href="dashboard.php?sk=items&it=add" class='btn btn-primary'><i class='fa fa-plus'></i><?php echo lang('addit');?></a>
                        <div class="alert alert-danger" style='<?php echo $disp;?>'>
                            <?php echo $detox;?>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i><?php echo lang('It');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>price</th>
                                                <th>date</th>
                                                <th>Country</th>
                                                <th>image</th>
                                                <th>statu</th>
                                                <th>categorie</th>
                                                <th>member</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Name</th>
                                                <th>description</th>
                                                <th>price</th>
                                                <th>date</th>
                                                <th>Country</th>
                                                <th>image</th>
                                                <th>statu</th>
                                                <th>categorie</th>
                                                <th>member</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            
                                            $sql = 'SELECT * FROM items';
                                            $stm = $con->prepare($sql);
                                            $stm->execute();

                                            $data = $stm->fetchAll();
                                            foreach ($data as  $value) {
                                                ?>
                                                <tr>
                                                <td><?php echo $value['name'];?></td>
                                                <td><?php echo $value['description'];?></td>
                                                <td><?php echo $value['price'];?></td>
                                                <td><?php echo $value['date'];?></td>
                                                <td><?php echo $value['country'];?></td>
                                                <td>
                                                    <?php
                                                    
                                                    if($value['image'] == "")
                                                    {
                                                        ?>
                                                        <form  method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="idphoto" id='idphoto' value='<?php echo $value['ID'];?>'>
                                                            
                                               <div class="custom-file">
                                        <input class='custom-file-input' type="file" name="image" >
                                         <label class="custom-file-label" for="uphoto"><?php echo lang('chphoto');?></label>
                                                  </div>
                                                            <br>
                                                            <input type="submit" value="<?php echo lang('addph');?>" name='addphoto' class='btn btn-primary btn-sm'>
                                                        </form>

                                                        <?php

                                                    } else{
                                                           ?>
                                                           <img style='width : 100px; height:100px;' src="<?php echo $photos . $value['image'];?>" alt="photo item">
                                                        <form  method="post">
                                                            <input type="hidden" name="idphoto1" id='idphoto1' value='<?php echo $value['ID'];?>'>
                                                            <input type="submit" value="<?php echo lang('delph');?>" id="deletephoto" name='deletephoto' class='btn btn-danger btn-sm'>
                                                        </form>
                                                        <?php
                                                    }
                                                    
                                                    ?>


                                                </td>
                                                <td>
                                                    <?php
                                                    
                                                    echo $status[$value['status']];
                                                    
                                                    ?>
                                                </td>
                                                <td><?php 
                                                $sql = 'SELECT * FROM categories';
                                                $stm = $con->prepare($sql);
                                                $stm->execute();
                                                $dt = $stm->fetchAll();
                                                foreach ($dt as  $val) {
                                                   if($val['ID'] == $value['cat_id'] )
                                                   {
                                                       echo $val['name'];
                                                   break;
                                                   }
                                                }
                                                ?></td>
                                                <td>
                                                <?php 
                                                $sql = 'SELECT * FROM users';
                                                $stm = $con->prepare($sql);
                                                $stm->execute();
                                                $dt = $stm->fetchAll();
                                                foreach ($dt as  $val) {
                                                   if($val['ID'] == $value['member_id'] )
                                                   {
                                                       echo $val['fullName'];
                                                   break;
                                                   }
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <a href="dashboard.php?sk=items&it=update&id=<?php echo $value['ID'];?>" class='btn btn-success'><?php echo lang('edit');?></a>
                                                    <a href="dashboard.php?sk=items&it=delete&id=<?php echo $value['ID'];?>" class='btn btn-danger'><?php echo lang('del');?></a>
                                                </td>
                                                </tr>
                                                <?php
                                            }

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
    } else if($it == 'update')
    {
     
      $run = false;
      $sql = 'SELECT * FROM items';
      $stm = $con->prepare($sql);
      $stm->execute();
      $data = $stm->fetchAll();
      foreach ($data as $value) {
        if($id == $value['ID'])
        {
           $run = true;
        break;
        } 
      }
      
      if($run)
       {
           
           ?>
           <div class="container">
   <div class="row">
   <!-- Material form contact -->
<div class="card col-lg-12 col-md-12 col-sm-2">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('upitem');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='POST' style="color: #757575;">
    <input type="hidden" name="idupitem" value='<?php echo $id;?>'>
    <?php 
    
    $sql = 'SELECT name, description, price, date, country, image, status, rating, cat_id, member_id FROM items WHERE ID = ?';
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $tdd = $stm->fetch();

    ?>
    

        <!-- name -->
        <div class="md-form mt-3">
            <input type="text" id="upnameit" name='upnameit' class="form-control" value='<?php echo $tdd['name'];?>'>
            <label for="upnameit"><?php echo lang('namecat');?></label>
        </div>

        <!-- description -->
        <textarea id="updescit" name='updescit' value='<?php echo $ttd['description'];?>' class="form-control md-textarea content" rows="3"></textarea>
      

      <!-- price -->
      <div class="md-form mt-3">
            <input type="text" id="uppriceit" name='uppriceit' class="form-control" value='<?php 
             $afficher = $tdd['price'];
            $afficher = str_replace('$','',$afficher);
            echo $afficher;
            ?>'>
            <label for="uppriceit"><?php echo lang('pr');?></label>
        </div>
       
       <!-- Country -->
       <label for="upcountry"><?php echo lang('cntr');?></label>
    <select class="form-control" id="upcountry" name='upcountry'>
    <option disabled selected><?php echo lang('chcntr');?></option>
    <?php 
    foreach ($pays as $key => $value) {
        ?>
         <option value='<?php echo $value;?>'
         <?php
         if($value == $tdd['country'])
         {
             echo 'selected';
         }
         ?>
       
       


         ><?php echo $value;?></option>
        <?php
    }
    
    
    ?>
     
    </select>

    <!-- status -->
    <label for="upstat"><?php echo lang('st');?></label>
    <select class="form-control" id="upstat" name='upstat'>
    <option disabled selected><?php echo lang('chst');?></option>
    <?php 
    foreach ($status as $key => $value) {
        ?>
         <option value='<?php echo $value;?>'
         <?php
         
         if($status[$tdd['status']] == $value)
         {
             echo 'selected';
         }

         ?>

         ><?php echo $value;?></option>
        <?php
    }
    
    
    ?>
     
    </select>
   
    <!-- member -->
    <label for="upmember"><?php echo lang('memsin');?></label>
    <select class="form-control" id="upmember" name='upmember'>
    <option disabled selected>...</option>
    <?php 
    $sql='SELECT * FROM users';
    $st = $con->prepare($sql);
    $st->execute();
    $data = $st->fetchAll();
    foreach ($data as  $value) {
     
        ?>
         <option value="<?php echo $value['fullName'];?>"
         <?php
          $tr = $con->prepare('SELECT fullName from users WHERE ID = ?');
          $tr->execute(array($tdd['member_id']));
          $df = $tr->fetch();

          if($df['fullName'] == $value['fullName'])
          {
              echo 'selected';
          }

         
         ?>
         
         ><?php echo $value['fullName'];?></option>
        <?php
  
}
    
    ?>
     
    </select>

    <!-- category -->
    <label for="upcat"><?php echo lang('cat');?></label>
    <select class="form-control" id="upcat" name='upcat'>
    <?php 
   $st = $con->prepare('SELECT * FROM categories');
   $st->execute();
   $data = $st->fetchAll();
    foreach ($data as  $value) {
     
        ?>
         <option value="<?php echo $value['name'];?>"
         <?php
          $tr = $con->prepare('SELECT name from categories WHERE ID = ?');
          $tr->execute(array($tdd['cat_id']));
          $df = $tr->fetch();

          if($df['name'] == $value['name'])
          {
              echo 'selected';
          }

         
         ?>
         ><?php echo $value['name'];?></option>
        <?php
  
}
    
    ?>
     
    </select>
       
      

        

         
       <!-- alert informarion -->
       <div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'>
       <?php echo $info;?>
       </div>


      
        <input type="submit" name='it'  value="<?php echo lang('up');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect">

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>

             
           <?php
       } else{
        
        redirect();
        ?>
        
        <?php 
       }

            
    }else if($it == 'delete')
    {
        $run = false;
      $sql = 'SELECT * FROM items';
      $stm = $con->prepare($sql);
      $stm->execute();
      $data = $stm->fetchAll();
      foreach ($data as $value) {
        if($id == $value['ID'])
        {
           $run = true;
        break;
        } 
      }
      
      if($run)
       {
          /////////// to get the file name from the mysql
   $gets = 'SELECT image FROM items WHERE ID = ?';

   $sta = $con->prepare($gets);
   $sta->execute(array($id));
   $dt = $sta->fetch();

   /////////////////////////////// to remove from mysql and folder

   if($dt['image'] !== '')
   {
      $sql='DELETE FROM items WHERE ID = ?';
      $stm = $con->prepare($sql);
      $stm->execute(array($id));
      unlink($photos . $dt['image']);
   } 
           ?>
           <div class="alert alert-danger">
               deleted successfuly
           </div>
             
           <?php
           redirect();
       } else{
        
        redirect();
        ?>
        
        <?php 
       }

        
    }
}elseif($change == 'members')
{
    $edit = (isset($_GET['edit'])) ? $edit = $_GET['edit'] : $edit = 'none';
    $rs = (isset($_GET['rs'])) ? $rs = $_GET['rs'] : $rs = 'none';
    
    $editmem = false;
    $hash = sha1($_SESSION['password']);
   $sql = 'SELECT ID, username, password,email,fullName FROM users WHERE username = ? AND password = ? AND groupID = 1 ';
   $state = $con->prepare($sql);
   $state->execute(array($_SESSION['username'],$hash));
   $row = $state->fetch();
   $cnt = $state->rowCount();
   
   
   if($edit == 'update')
   {

   
   ?>
   <div class="container">
   <div class="row">
   <!-- Material form contact -->
<div class="card col-lg-12 col-md-12 col-sm-2">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('editmem');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='POST' style="color: #757575;">
    

        <!-- username -->
        <div class="md-form mt-3">
            <input type="text" id="username" name='username' class="form-control" value='<?php echo $row['username'];?>' disabled>
            <label for="username"><?php echo lang('user');?></label>
        </div>
      

        <!-- password -->
        <div class="md-form mt-3">
            <input type="password" id="password" name='password' class="form-control" required>
            <label for="password"><?php echo lang('paswd');?></label>
            <span id='passValidation'></span>
        </div>

        <!-- E-mail -->
        <div class="md-form">
            <input type="email" id="email" name='email' class="form-control" value='<?php echo $row['email'];?>' required>
            <label for="email"><?php echo lang('email');?></label>
            <span id='emailValidation'></span>
           
        </div>

         <!-- full name -->
         <div class="md-form">
            <input type="text" id="name" name='name' class="form-control" value='<?php echo $row['fullName'];?>' required>
            <label for="name"><?php echo lang('name');?></label>
            
            <span id='nameValidation'></span>
        </div>
       <!-- alert informarion -->
       <div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'>
       <?php echo $info;?>
       </div>

       <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" id='check' class="form-check-input"><?php echo lang('con');?>
  </label>
</div>
<input type="hidden" id='id' name="id" value='<?php echo $row['ID'];?>'>

      
        <input type="submit" name='update' id='update' value="<?php echo lang('up');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect">

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>

   <?php
   } elseif($edit == 'add')
   {
       ?>
       <div class="container">
   <div class="row">
   <!-- Material form contact -->
<div class="card col-lg-12 col-md-12 col-sm-2">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('add');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='POST' style="color: #757575;">
    

        <!-- username -->
        <div class="md-form mt-3">
            <input type="text" id="addusername" name='addusername' class="form-control" required>
            <label for="addusername"><?php echo lang('user');?></label>
            <span id='addon1'></span>
        </div>
      

        <!-- password -->
        <div class="md-form mt-3">
            <input type="password" id="addpassword" name='addpassword' class="form-control" required>
            <label for="addpassword"><?php echo lang('paswd');?></label>
            <span id='addon2'></span>
        </div>

        <!-- E-mail -->
        <div class="md-form">
            <input type="email" id="addemail" name='addemail' class="form-control" required>
            <label for="addemail"><?php echo lang('email');?></label>
            <span id='addon3'></span>
           
        </div>

         <!-- full name -->
         <div class="md-form">
            <input type="text" id="addname" name='addname' class="form-control" required>
            <label for="addname"><?php echo lang('name');?></label>
            
            <span id='addon4'></span>
        </div>
       <!-- alert informarion -->
       <div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'><?php echo $msg;?>
       </div>

       <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" id='check1' class="form-check-input"><?php echo lang('con');?>
  </label>
</div>

      
        <input type="submit" name='addmem' id='addmem' value="<?php echo lang('add');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect">

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>
       <?php
   }elseif($edit == 'none')
   {
       ?>
       <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('manage');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF'];?>"><?php echo lang('dash');?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('mem');?></li>
                        </ol>
                        <a href="dashboard.php?sk=members&edit=add" class='btn btn-primary'><i class='fa fa-plus'></i> <?php echo lang('add');?></a>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-users mr-1"></i> <?php echo lang('manage');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Registred Date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>ID</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Registred Date</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $sql = 'SELECT * FROM users WHERE groupID !=1 ';
                                            $st = $con->query($sql);
                                      while ($row = $st->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ID'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['fullName'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td>
                                                <a href="dashboard.php?sk=members&edit=ed&rs=<?php echo $row['ID'];?>" class='btn btn-success btn-sm'><?php echo lang(('edit'));?></a>
                                                <a href="dashboard.php?sk=members&edit=del&rs=<?php echo $row['ID'];?>" class='btn btn-danger btn-sm'><?php echo lang(('del'));?></a>
                                                </td>
                                            </tr>
                                            <?php
                                         }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
       <?php
   } elseif($edit == 'ed')
   {
       ?>
       <div class="container">
   <div class="row">
   <!-- Material form contact -->
<div class="card col-lg-12 col-md-12 col-sm-2">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('updatemem');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='POST' style="color: #757575;">
    

        <!-- username -->
        <div class="md-form mt-3">
         <input type="hidden" name="updatekey" value='<?php echo $rs;?>'>

            <input type="text" id="updateuser" name='updateuser' class="form-control" required>
            <label for="updateusername"><?php echo lang('user');?></label>
            <span id='up1'></span>
        </div>
      

       

        <!-- E-mail -->
        <div class="md-form">
            <input type="email" id="updateemail" name='updateemail' class="form-control" required>
            <label for="updateemail"><?php echo lang('email');?></label>
            <span id='up2'></span>
           
        </div>

         <!-- full name -->
         <div class="md-form">
            <input type="text" id="updatename" name='updatename' class="form-control" required>
            <label for="updatename"><?php echo lang('name');?></label>
            
            <span id='up3'></span>
        </div>
       <!-- alert informarion -->
       <div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'><?php echo $msg;?>
       </div>

       <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" id='check2' class="form-check-input"><?php echo lang('con');?>
  </label>
</div>

      
        <input type="submit" name='updatemem' id='updatemem' value="<?php echo lang('updatemem');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect">

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>

       <?php
   } elseif($edit == 'del')
   {
       ?>
       <?php
       $sql = 'DELETE FROM `users` WHERE ID= :ID ';
       $count=$con->prepare($sql);
    $count->bindParam(":ID",$rs,PDO::PARAM_INT);
    $count->execute();
       ?>
       
           <div class="alert alert-success">
           <?php echo lang('delrecor'); 
           redirect();
           
           ?>
           
       </div>
      
       <?php
   } elseif($edit == 'pending')
   {
       ?>
       <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('managepen');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF'];?>"><?php echo lang('dash');?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('mem');?></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-users mr-1"></i> <?php echo lang('managepen');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Registred Date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>ID</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Registred Date</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $sql = 'SELECT * FROM users WHERE groupID !=1 AND regStatus = 0 ';
                                            $st = $con->query($sql);
                                      while ($row = $st->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ID'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['fullName'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td>
                                                <a href="dashboard.php?sk=members&edit=ed&rs=<?php echo $row['ID'];?>" class='btn btn-success btn-sm'><?php echo lang(('edit'));?></a>
                                                <a href="dashboard.php?sk=members&edit=del&rs=<?php echo $row['ID'];?>" class='btn btn-danger btn-sm'><?php echo lang(('del'));?></a>
                                                <a href="dashboard.php?sk=members&edit=pen&rs=<?php echo $row['ID'];?>" class='btn btn-primary btn-sm'><?php echo lang(('activate'));?></a>
                                                </td>
                                            </tr>
                                            <?php
                                         }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
       
       <?php
   } elseif($edit == 'pen')
   {
       ?>
       <?php 
        $sql = 'UPDATE users SET regStatus= ?  WHERE ID = ?';

        $stm = $con->prepare($sql);
        $stm->execute(array(1,$rs));
       ?>
       <div class="alert alert=success">
       <?php echo redirect();?>
       </div>
       <?php
   }




}elseif($change == 'users')
{
    if($tf == 'none')
    {
    ?>
   <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('users');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF'];?>"><?php echo lang('dash');?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('users');?></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-users mr-1"></i> <?php echo lang('users');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>name</th>         
                                                <th>username</th>
                                                <th>email</th>
                                                <th>adress</th>
                                                <th>picture</th>
                                                <th>phone</th>
                                                <th>ip</th>
                                                <th>language</th>
                                                <th>statu</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>name</th>         
                                                <th>username</th>
                                                <th>email</th>
                                                <th>adress</th>
                                                <th>picture</th>
                                                <th>phone</th>
                                                <th>ip</th>
                                                <th>language</th>
                                                <th>statu</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        $stm = $con->prepare('SELECT * FROM membres');
                                        $stm->execute();
                                        $data = $stm->fetchAll();
                                        foreach($data as $inf)
                                        {
                                        ?>
                                        <tr>
                                        <td>
                                        <?php
                                        if($inf['name_member'] !== '')
                                        {
                                            echo $inf['name_member'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['username_member'] !== '')
                                        {
                                            echo $inf['username_member'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['email'] !== '')
                                        {
                                            echo $inf['email'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['adress_member'] !== '')
                                        {
                                            echo $inf['adress_member'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                       
                                        <td>
                                        <?php
                                        if($inf['profile_picture'] !== '')
                                        {
                                            ?>
                                            <img style='width:250px;height:250px;' src= '<?php echo $photos. $inf['profile_picture']; ?>' alt='profile photo' />
                                            <?php
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                     
                                        <td>
                                        <?php
                                        if($inf['phone'] !== '')
                                        {
                                            echo $inf['phone'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      

                                        <td>
                                        <?php
                                        if($inf['ip_membre'] !== '')
                                        {
                                          echo $inf['ip_membre'];
                                            
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>

                                        <td>
                                        <?php
                                        if($inf['langs'] !== '')
                                        {
                                          echo $lala[$inf['langs']];
                                            
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                       <td>
                                       <?php
                                       if($inf['verif_email'] == '0')
                                       {
                                           echo '<span style="color:green;">  active </span>';

                                       }else{
                                        echo '<span style="color:red;"> not active </span>';
                                       }
                                       ?>
                                       </td>
                                       <td>
                                       <a href="dashboard.php?sk=users&tf=delete&bts=<?php echo $inf['ID']; ?>" class="btn btn-danger btn-sm"><?php echo lang('del'); ?></a>
                                       <a style='margin-top:10px;' href="dashboard.php?sk=users&tf=purchases&bts=<?php echo $inf['ID']; ?>" class="btn btn-info btn-sm"><?php echo lang('pur'); ?></a>
                                       </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
    
    <?php
    }elseif($tf == 'delete')
    {
        $check = $con->prepare('SELECT * FROM membres WHERE ID = ?');
        $check->execute([$bts]);
     $ch = $check->fetch();
     if(@$ch['ID'])
     {
        if(is_numeric($bts))
        {
            if($ch['profile_picture'] == '')
            {
                if(file_exists($photos . $ch['profile_picture']))
                {
                    $stmt = $con->prepare('DELETE FROM membres WHERE ID = ?');
            $stmt->execute([$bts]);
            unlink($photos . $ch['profile_picture']);
            header('Location: dashboard.php?sk=users');
                } else{
                    $stmt = $con->prepare('DELETE FROM membres WHERE ID = ?');
            $stmt->execute([$bts]);
            header('Location: dashboard.php?sk=users');
                }

            } else{
                if(file_exists($photos . $ch['profile_picture']))
                {
                    $stmt = $con->prepare('DELETE FROM membres WHERE ID = ?');
            $stmt->execute([$bts]);
            unlink($photos . $ch['profile_picture']);
            header('Location: dashboard.php?sk=users');
                } else{
                    $stmt = $con->prepare('DELETE FROM membres WHERE ID = ?');
                   $stmt->execute([$bts]);
                    header('Location: dashboard.php?sk=users');
                }

            }
           
        }else{
            header('Location: dashboard.php');
        }

     } else{
         header('Location: dashboard.php');
     }

    }elseif($tf == 'purchases')
    {
        $check = $con->prepare('SELECT * FROM membres WHERE ID = ?');
        $check->execute([$bts]);
     $ch = $check->fetch();
     if(@$ch['ID'])
     {
         if(is_numeric($bts))
         {
            ?>
            <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('users');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF'];?>"><?php echo lang('dash');?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('users');?></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-users mr-1"></i> <?php echo lang('users');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>transaction N </th>         
                                                <th>name</th>
                                                <th>mobile</th>
                                                <th>payment</th>
                                                <th>product</th>
                                                <th>statu</th>
                                                <th>action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>transaction N </th>         
                                                <th>name</th>
                                                <th>mobile</th>
                                                <th>payment</th>
                                                <th>product</th>
                                                <th>statu</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        $stm = $con->prepare('SELECT * FROM requests WHERE id_member = ?');
                                        $stm->execute([$ch['ID']]);
                                        $data = $stm->fetchAll();
                                        foreach($data as $inf)
                                        {
                                        ?>
                                        <tr>
                                        <td>
                                        <?php
                                        if($inf['transaction'] !== '')
                                        {
                                            echo $inf['transaction'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['name_buyer'] !== '')
                                        {
                                            echo $inf['name_buyer'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['mobile_buyer'] !== '')
                                        {
                                            echo $inf['mobile_buyer'];
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                      
                                        <td>
                                        <?php
                                        if($inf['payment'] !== '')
                                        {
                                            if($inf['payment'] == 1)
                                            {
                                                echo 'postal payment';
                                            }else{
                                                echo 'paypal payment';
                                            }
                                        }else{
                                           echo 'no data available';
                                        }
                                        ?>

                                        </td>
                                       
                                        <td>
                                        <?php
                                        $prod = $con->prepare('SELECT * FROM items WHERE ID = ?');
                                        $prod->execute([$inf['id_product']]);
                                        $product = $prod->fetch();
                                        echo $product['name'];
                                        ?>

                                        </td>
                                     
                                        <td>
                                        <?php
                                        $drone = false;
                                        if($inf['payment'] == 1)
                                        {
                                            if($inf['statu'] == 1)
                                            {
                                                $cl = $con->prepare('SELECT * FROM payment WHERE transaction_member = ?');
                                                $cl->execute([$inf['transaction']]);
                                                $clp  = $cl->fetch();
                                                
                                                if(@$clp['ID'])
                                                {
                                                    
                                                if($clp['clip'] !== '')
                                                {
                                                    ?>
                                                    <img style='wdith 250px;height:250px;' src="<?php echo $clip . $clp['clip']; ?>" alt="clip" />
                                                    <?php
                                                    echo '<span style="color:yellow;">pending</span>';
                                                    $drone = true;
                                                }
                                                }else{
                                                    echo '<span style="color:red;">not paid</span>';  
                                                }
                                              
                                            }elseif($inf['statu']==0){
                                                echo '<span style="color:green;"> paid</span>';   
                                            }else{
                                                echo '<span style="color:red;"> cancelled</span>';   
                                            }
                                        }elseif($inf['payment'] == 0){

                                       echo '<span style="color:green;"> paid</span>';  
                                        }
                                        ?>

                                        </td>
                                      
                                       <td>
                                       <a href="dashboard.php?sk=users&tf=delete_payment&bts=<?php echo $inf['transaction']; ?>" class="btn btn-danger btn-sm"><?php echo lang('del'); ?></a>
                                       <?php
                                       if($drone)
                                       {
                                           ?>
                                           <a style='margin-top:10px;' href="dashboard.php?sk=users&tf=approve&bts=<?php echo $inf['transaction']; ?>" class="btn btn-info btn-sm"><?php echo lang('appr'); ?></a>
                                           <?php
                                       }
                                       ?>
                                       
                                       </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            <?php 
         }else{
             header('Location: dashboard.php');
         }
     }else{
        header('Location: dashboard.php');
     }
    }elseif($tf == 'approve')
    {
      $test = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
      $test->execute([$bts]);
      $dt = $test->fetch();

      if(@$dt['ID'])
      {
        $aprv = $con->prepare('UPDATE requests SET statu=? WHERE transaction = ?');
        $aprv->execute([0,$bts]);
        header('Location: dashboard.php?sk=users');
      }else{
        header('Location: dashboard.php?sk=users'); 
      }
    }elseif($tf == 'delete_payment')
    {
        $del = $con->prepare('DELETE FROM requests WHERE transaction = ?');
        $del->execute([$bts]);
        header('Location: dashboard.php?sk=users'); 
    }

}elseif($change == 'comments')
{
    
    if($tf == 'edit')
    {
       
        $stmt = $con->prepare("SELECT * FROM comments WHERE id=3");
       $stmt->execute(); 
       $data = $stmt->fetch();
        
       ?>
       <div class="container">
   <div class="row">
   <!-- Material form contact -->
<div class="card col-lg-12 col-md-12 col-sm-2">

<h5 class="card-header info-color white-text text-center py-4">
    <strong><?php echo lang('up');?></strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method='POST' style="color: #757575;">
    

        <!-- key -->
        <div class="md-form mt-3">
         <input type="hidden" name="upitkey" value='<?php echo $bts;?>'>
        </div>

        <!--description-->
        <label for="commentup"><?php echo lang('comup');?></label>
        <div class="md-form">
        
            <textarea id="commentup" name='commentup' placeholder='comment'  class="form-control md-textarea" rows="3"><?php echo $data['comment'];?></textarea>
        </div>

        <!-- date -->
        <div class="md-form">
        <input type="date" name="dateit" value='<?php echo $data['comment_date'];?>' id="dateit" class="form-control">    
            <label for="dateit"><?php echo lang('dt');?></label>                
        </div>
<!-- item -->
        <div class="form-group">
    <label for="exampleFormControlSelect4"><?php echo str_replace("Add ","",lang("addit")); ?></label>
    <select class="form-control" id="exampleFormControlSelect4" name='itemupcomment'>
    <?php
    $stm = $con->prepare('SELECT name FROM items');
    $stm->execute();
    $names = $stm->fetchAll();
    foreach ($names as  $fet) {
        ?>n
        <option value="
        <?php
        echo $fet['name']; 
         ?>
        "
        <?php
        $stm2 = $con->prepare('SELECT item_id FROM comments WHERE id = ? ');
        $stm2->execute(array($bts));
        $df = $stm2->fetch();
        ///////////////
        $stm2 = $con->prepare('SELECT name FROM items WHERE ID = ? ');  
        $stm2->execute(array($df['item_id']));
        $dd = $stm2->fetch();
        if($dd['name'] == $fet['name'])
        {
            echo 'selected';
        }
        ?>  
        disabled>
       <?php
       echo $fet['name'];
       ?>
        </option>
        <?php
    }
    ?>
    
    </select>
  </div>

 <!-- user -->
 <div class="form-group">
    <label for="exampleFormControlSelect5"><?php echo 'user' ?></label>
    <select class="form-control" id="exampleFormControlSelect5" name='userupcomment'>
    <?php
    $stm = $con->prepare('SELECT fullName FROM users');
    $stm->execute();
    $names = $stm->fetchAll();
    foreach ($names as  $dom) {
     
    
    ?>
    <option value="<?php echo $dom['fullName'];?>"  
    <?php
    
    $stm3 = $con->prepare("SELECT * FROM comments WHERE ID = ? ");
    $stm3->execute(array($bts));
    $dt = $stm3->fetch();

    ///////////////////////
   $stm4 = $con->prepare('SELECT fullName FROM users WHERE ID = ? ');
   $stm4->execute(array($dt['user_id']));
   $test = $stm4->fetch();

   if($test['fullName'] == $dom['fullName'])
   {
       echo 'selected';
   }
    
    ?>


      disabled > <?php echo $dom['fullName'];?></option>
    <?php
    }
    ?>
    
    </select>
  </div>
       <!-- alert informarion -->
       <div class="alert alert-<?php echo $statu;?>" style='<?php echo $disp;?>'><?php echo $msg;?>
       </div>

        <input type="submit" name='updatecomment' id='updatecomment' value="<?php echo lang('up');?>" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect">

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form contact -->
   </div>
   </div>
       <?php
    } elseif($tf == 'delete')
    {
      if(isset($_GET['bts']) && is_numeric($_GET['bts']) && !empty($_GET['bts']))
      {
          $sql = 'DELETE FROM comments WHERE id = ?';
          $stm = $con->prepare($sql);
          $stm->execute(array($bts));
          echo '<div class="alert alert-danger">' .lang('itdel'). '</div>';
          redirect();
        
      }else{
          redirect();
      }
    } elseif($tf == 'active')
    {
        $sql = 'UPDATE comments SET status=? WHERE id = ?';
        $stm = $con->prepare($sql);
        $stm->execute(array(0,$bts));
        echo '<div class="alert alert-success">' .lang('itup'). '</div>';
        redirect();
    }
    elseif($tf == 'none')
    {
        ?>
        <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo lang('com');?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF'];?>"><?php echo lang('dash');?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('com');?></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-users mr-1"></i> <?php echo lang('com');?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>comment</th>         
                                                <th>date</th>
                                                <th>item</th>
                                                <th>user</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>comment</th>
                                                <th>date</th>
                                                <th>item</th>
                                                <th>user</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        $sql = 'SELECT * FROM comments';
                                        $stm = $con->prepare($sql);
                                        $stm->execute();
                                        $data = $stm->fetchAll();
                                        foreach($data as $value)
                                        {
                                            ?>
                                        

                                            <tr>
                                            <td>
                                             <?php
                                             if(strlen($value['comment'])!==0)
                                             {
                                              echo $value['comment'];
                                             } else{
                                                 echo 'no data available';
                                             }
                                             ?>
                                            </td>
                                            <td>
                                            <?php
                                             echo $value['comment_date'];
                                             ?>
                                            </td>
                                            <td>
                                            <?php
                                             $sql='SELECT * FROM items WHERE ID = ?';
                                             $stm = $con->prepare($sql);
                                             $stm->execute(array($value['item_id']));
                                             $dt = $stm->fetch();
                                             echo $dt['name'];

                                             ?>
                                            </td>
                                            <td>
                                            <?php
                                             $sql='SELECT * FROM users WHERE ID = ?';
                                             $stm = $con->prepare($sql);
                                             $stm->execute(array($value['user_id']));
                                             $dt = $stm->fetch();
                                             echo $dt['fullName'];
                                             ?>
                                            </td>
                                            <td>
                                            <a href="dashboard.php?sk=comments&tf=edit&bts=<?php echo $value['id'];?>" class='btn btn-sm btn-success'><?php echo lang('edit');?></a>
                                            <a href="dashboard.php?sk=comments&tf=delete&bts=<?php echo $value['id']; ?>" class='btn btn-sm btn-danger'><?php echo lang('del');?></a>
                                            <?php
                                            
                                            if($value['status'] == 1)
                                            {
                                                ?>
                                                <a href="dashboard.php?sk=comments&tf=active&bts=<?php echo $value['id']; ?>" class='btn btn-sm btn-primary'><?php echo lang('activate');?></a>
                                                <?php
                                            }
                                            
                                            ?>
                                           
                                            </td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        <?php
    }

    ?>
    
       
    <?php
}else{
    header('Location: index.php');
}
?>