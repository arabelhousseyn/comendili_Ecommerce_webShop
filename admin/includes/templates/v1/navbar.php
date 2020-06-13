<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF'];?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?sk=categories"><?php echo lang('cat');?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?sk=items"><?php echo lang('It');?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?sk=members"><?php echo lang('mem');?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?sk=comments"><?php echo lang('com');?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?sk=users"><?php echo lang('users');?></a>
      </li>

     <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
     <!-- <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          
          <a href="dashboard.php?sk=members&edit=update" class='dropdown-item' style='font-weight:bold;'><?php echo lang('ed');?></a>
          <button class='dropdown-item'><?php echo lang('set');?></button>
          <form  method="post">
          <button type="submit" name='logout' class='dropdown-item'><?php echo lang('out');?></button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->