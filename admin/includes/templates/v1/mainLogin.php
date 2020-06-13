<div class="wrapper fadeInDown">
  <div id="formContent" style='padding:20px;'>
 

    
    <div class="fadeIn first">
      <img src="<?php echo $img . 'social.svg';?>" id="icon" alt="User Icon"height="50" width="150" />
    </div>
    

    
    <form  method="post">
      <input type="text" id="username" name='username' class="fadeIn second" placeholder="username">
      <input type="password" id="password" name='password' class="fadeIn third"placeholder="password">
      <div class="alert alert-<?php echo $statu;?>" style='<?php echo $style;?>'>
        <?php echo $msg;?>
      </div>
      <input type="submit" name='login' id='login' class="fadeIn fourth" value="Log In">
    </form>

  
  <!--  <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>-->

  </div>
</div>