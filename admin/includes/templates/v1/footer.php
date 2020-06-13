<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      
      <!-- Grid column -->

      

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase"><?php echo lang('lan');?></h5>

        <ul class="list-unstyled">
          <li>
            <a href="dashboard.php?language=1"><?php echo lang('ar');?></a>
          </li>
          <li>
            <a href="dashboard.php?language=0"><?php echo lang('en');?></a>
          </li>
          <li>
            <a href="dashboard.php?language=2"><?php echo lang('fr'); ?></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" id='dt'> 
    <a href="https://www.facebook.com/ynuzi"> Elhousseyn arab</a>
    <script>
    var d = new Date();
    document.write(d.getFullYear());
    </script>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="<?php echo $js . 'jquery-3.5.1.min.js';?>"></script>
<script src="<?php echo $js . 'style.js';?>"></script>
<script src="<?php echo $js . 'bootstrap.min.js';?>"></script>
<script src="<?php echo $js . 'datatables-demo.js';?>"></script>
<script src="<?php echo $js . 'jquery.richtext.js';?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/js/mdb.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo $js . 'boxit.js';?>"></script>
<script>
var d = new Date();
$(document).ready(function(){
    var date = $("#date");
    date.text(d.getFullYear());
});
$(document).ready(function(){

    ////////////// update member validation
    var bol = false,
    bol1 = false,
    bol2 = false;
    var email = $("#email"),
    pass = $('#password'),
    name = $('#name'),
    update = $('#update'),
    confirm = $('#check');
    update.attr('disabled', 'disabled');
    var validate1 = $('#passValidation'),
    validate2 = $('#emailValidation'),
    validate3 = $('#nameValidation');
    pass.change(function(){
        var len = pass.val();
        len = len.length;
        if(len == 0)
        {
            validate1.html('<p></p>'); 
        }
       else if(len > 0  && len <= 3)
        {
            validate1.html('<p style="color:red;">the password should not be short</p>'); 
        } else if(len > 3 && len < 6){
            validate1.html('<p style="color:yellow;">medium</p>'); 
            bol = true;
        } else if(len > 6)
        {
            validate1.html('<p style="color:green;">good</p>'); 
            bol = true;
       
        }
    });
    email.change(function(){
        var len = email.val();
        len = len.length;
        if(len == 0)
        {
            validate1.html('<p></p>'); 
        }
       else if(len > 0  && len <= 3)
        {
            validate2.html('<p style="color:red;">email not valid</p>'); 
        }  else if(len > 6)
        {
            validate2.html('<p style="color:green;">valid email</p>'); 
            bol1 = true;
        }
        if(bol1)
        {
            for (let i = 0; i < len; i++) {
              if(email.val().charAt(i) !== '@')
              {
                validate2.html('<p style="color:red;">enter a valid email</p>'); 
               $bol1 = false;
              } else{
                validate2.html('<p style="color:green;">valid email</p>'); 
                break;
                
              }
                
            }

        }
    });

    name.change(function(){
        var len = name.val();
        len = len.length;
        if(len == 0)
        {
            validate3.html('<p></p>'); 
        }
       else if(len > 0  && len <= 3)
        {
            validate3.html('<p style="color:red;">short name</p>'); 
        }  else if(len > 6)
        {
            validate3.html('<p style="color:green;">valid name</p>'); 
            bol2 = true;
        }
        
    });
    confirm.click(function(){
        if(bol && bol1 && bol2)
        {
            update.removeAttr('disabled');
        }
    });
    //////////////////add member validation
    var check1 = false,
    check2 = false,
    check3 = false;
    var addmem = $('#addmem'),
    confirm1 = $('#check1'),
    addusername = $('#addusername'),
    addpassword = $('#addpassword'),
    addemail = $('#addemail'),
    addname = $('#addname'),
    addon1 = $('#addon1'),
    addon2 = $('#addon2'),
    addon3 = $('#addon3'),
    addon4 = $('#addon4');

    addmem.attr('disabled','disabled');

    addusername.change(function(){
        if(addusername.val().length == 0)
        {
            addon1.html('<p></p>');
        }
        else if(addusername.val().length > 0 && addusername.val().length < 3)
        {
            addon1.html('<p style="color: red;">week you need to change it </p>');
        } else if(addusername.val().length >=3 && addusername.val().length <6   ){
            addon1.html('<p style="color:yellow;">medium</p>');
            check1 = true;
        } else if(addusername.val().length > 6  )
        {
            addon1.html('<p style="color:green;">good</p>');
            check1 = true;

        }
    });

    addpassword.change(function(){
        if(addpassword.val().length == 0)
        {
            addon2.html('<p></p>');

        } else if(addpassword.val().length > 0 && addpassword.val().length <3 )
        {
            addon2.html('<p style="color:red;">week you need to change it</p>');

        } else if (addpassword.val().length >=3 && addpassword.val().length < 6)
        {
            addon2.html('<p style="color:yellow;">medium</p>');
            check2 = true;

        } else if (addpassword.val().length > 6)
        {
            addon2.html('<p style="color:green;">good</p>');
            check2 = true;
        }
    });

    addemail.change(function(){
        if(addemail.val().length == 0)
        {
            addon3.html('<p></p>');
        } else if(addemail.val().length > 5)
        {
            for (let i = 0; i < addemail.val().length; i++) {
                if(addemail.val().charAt(i) !== '@')
                {
                    addon3.html('<p style="color:red;">email not valid</p>');
                } else{
                    addon3.html('<p style="color:green;">valid email</p>');
                    check3 = true;
                    break;
                
                }
            }
        }
    });

    addname.change(function(){
        if(addname.val().length == 0)
        {
            addon4.html('<p></p>');
        } 
        else if(addname.val().length>0 && addname.val().length <= 2){
            addon4.html('<p style="color:red;">please enter a valid name</p>');
        } else if(addname.val().length > 2)
        {
            addon4.html('<p style="color:grren;">valid name</p>');
            check3 = true;

        }
    });
    confirm1.click(function(){
        if(check1 && check2 && check3)
        {
            addmem.removeAttr('disabled');
        } else{
            confirm1.prop('checked', false); 
        }
    });
    /////////// update member from admin
    var ball = false,
    ball1 = false,
    ball2 = false;
    var updateuser = $('#updateuser'),
    updateemail = $('#updateemail'),
    updatename = $('#updatename'),
    updatemem = $('#updatemem'),
    check2 = $('#check2'),
    up1 = $('#up1'),
    up2 = $('#up2'),
    up3 = $('#up3');

    updatemem.attr('disabled','disabled');

    updateuser.change(function(){
        if(updateuser.val().length == 0)
        {
            up1.html('<p></p>');

        } else if (updateuser.val().length > 0 && updateuser.val().length <= 2)
        {
            up1.html('<p style="color:red;">invalid username please change it</p>');

        } else if(updateuser.val().length > 2 && updateuser.val().length < 6)
        {
            up1.html('<p style="color:yellow;">week</p>');
            ball = true;

        } else if (updateuser.val().length >= 6 )
        {
            up1.html('<p style="color:green;">good</p>');
            ball = true; 
        }
    });
    updateemail.change(function(){
        if(updateemail.val().length == 0)
        {
            up2.html('<p></p>');
        } else if(updateemail.val().length > 5)
        {
            for (let i = 0; i < updateemail.val().length; i++) {
                
                if(updateemail.val().charAt(i) !== '@')
                {
                    up2.html('<p style="color:red;">invalid email</p>');
                    
                } else{
                    up2.html('<p style="color:green;">valid email</p>');
                    ball1 = true;
                    break;

                }
            }
        }
    });
    
    updatename.change(function(){
        if(updatename.val().length == 0)
        {
            up3.html('<p></p>');
        } else if(updatename.val().length > 0 && updatename.val().length <=2)
        {
            up3.html('<p style="color:red;">invalid name</p>');
        } else if (updatename.val().length > 2 && updatename.val().length < 6)
        {
            up3.html('<p style="color:yellow;">week</p>');
            ball2 = true;
        } else if (updatename.val().length >= 6)
         {
             up3.html('<p style="color:grren;">good</p>');
             ball2 = true;

         }
    });
    check2.click(function(){
        if(ball && ball1 && ball2)
        {
            updatemem.removeAttr('disabled');

        } else {
            check2.prop('checked', false); 
        }
    });
    ////////////// add categorie validation
    var valid1 = false;

    var addcat = $('#addcat'),
    checkcat = $('#checkcat'),
    valdesc = $('#validatedesc'),
    valnamedesc = $('#validatenamedesc'),
    desc = $('#desc'),
    namedesc = $('#namedesc');
    
    addcat.attr('disabled','disabled');
    
    namedesc.change(function(){
        if(namedesc.val().length == 0)
        {
            valnamedesc.html('<p></p>'); 
        } else if(namedesc.val().length > 0 && namedesc.val().length <=2)
        {
            valnamedesc.html('<p style="color:red;">invalid name categorie</p>');
        } else if(namedesc.val().length > 2 )
        {
            valnamedesc.html('<p style="color:green;">valid</p>');
            valid1 = true;
        }
    });
    

  checkcat.click(function(){
      if(valid1)
      {
          addcat.removeAttr('disabled');
      }
  });

  $('.content').richText();
  $('.activeFull').css('color','red');

$('#full').click(function(){
   
   $('.all').slideDown();
   $('.activeFull').css('color','red');
   $('.activeClassic').css('color','');


});
$('#classic').click(function(){
    $('.all').slideUp();
    $('.activeClassic').css('color','red');
    $('.activeFull').css('color','');
});
$('.activeAsc').css('color','red');
$('#asc').click(function(){
    $('.or').html('asc');
    $('.activeAsc').css('color','red');
    $('.activeDesc').css('color','');
    $('.try').html('SELECT * FROM categories ORDER BY ordering ASC');
});
$('#desc').click(function(){
    $('.or').html('desc');
    $('.activeAsc').css('color','');
    $('.activeDesc').css('color','red');
    $('.try').html('SELECT * FROM categories ORDER BY ordering DESC');
});

$('.slid').slideUp();

$('#tog').click(function(){
    $('.slid').slideToggle();
    
});


    


    


    
});

</script>
</body>
</html>