var d = new Date();
$(document).ready(function(){
    var date = $("#date");
    date.text(d.getFullYear());
});
$(document).ready(function(){
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

    
});