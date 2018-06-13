var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("form-tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
    
  }
  if (n == (x.length - 1)) {
    
   document.getElementById("nextBtn").innerHTML = "Purchase";
   document.getElementById("prevBtn").innerHTML = 'Preview'; 
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
   ;
  }
  // ... and run a function that displays the correct step indicator:
  //fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("form-tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :


  if (currentTab == 0) {
    //...the form gets submitted:
    showTab(currentTab);
    
    return false;
  } else if (currentTab == 1) {
   // alert("1");

   $('#wallet').on('keyup', function(){

    if($('#wallet').val().length < 5) {
      // 26
        $('#msg_error').show();
        $('#msg_error').html('invalid wallet id');
        $('#nextBtn').attr('disabled',true);
        //alert($('#wallet').val().length);

      }  else if ($('#wallet').val().length > 5) {
        //35
        $('#msg_error').show();
        $('#msg_error').html('invalid wallet');
        $('#nextBtn').attr('disabled',true);

      } else if ($('#wallet').val().length == 5) {
        //35
        $('#msg_error').hide();
        // $('#ok').show();
        $('#nextBtn').attr('disabled',false);
      } 


   });
   
    $('#confirm_wallet').on('keyup', function() {
      var confirm_wallet = $("#confirm_wallet").val();
      var wallet = $('#wallet').val();

      if(confirm_wallet != wallet) {
        $('#wallet_msg').show();
        $('#wallet_ok').hide();
        $('#wallet_msg').html('wallet id didnt match');
         $('#nextBtn').attr('disabled',true);
      } else {
        $('#wallet_msg').hide();
        $('#wallet_ok').show();
        $('#nextBtn').attr('disabled',false);
      }

      
      
          
          //$('#nextBtn').attr('disabled',true);
      
    });

  } else if (currentTab == 2) {
    //alert("2");
  } else if (currentTab == 3) {

   $("#phone_no").on('keyup', function() {

    if($('#phone_no').val().length < 11) {
      $('#number_msg').show();
        $('#number_msg').html('invalid number');
         $('#nextBtn').attr('disabled',true);

    } else if ($('#phone_no').val().length > 11) {
      $('#number_msg').show();
        $('#number_msg').html('invalid number');
         $('#nextBtn').attr('disabled',true);

    } else if ($('#phone_no').val().length == 11) {
      $('#number_msg').hide();
      $('#nextBtn').attr('disabled',false);
    }

      
    
   });
    
  } else if (currentTab == 4) {
    //alert("4");
    validatepassword();
      //vaildateBankDetails();
  } else if (currentTab == 5) {
    $("#ac_number").on('keyup', function() {

    if($('#ac_number').val().length < 10) {
      $('#ac_msg').show();
        $('#ac_msg').html('invalid number');
         $('#nextBtn').attr('disabled',true);

    } else if ($('#ac_number').val().length > 10) {
      $('#ac_msg').show();
        $('#ac_msg').html('invalid number');
         $('#nextBtn').attr('disabled',true);

    } else if ($('#ac_number').val().length == 10) {
      $('#ac_msg').hide();
      $('#nextBtn').attr('disabled',false);
    }

      
    
   });
    vaildateBankDetails();
   
    
  } else if(currentTab == 6) {
    //alert("6");
     confirmDetails();

      $('#nextBtn').attr('id', 'purchase');
      $('#purchase').click(function(e){
                document.getElementById("form_id").submit();         
      });
      
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("form-tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
       // 
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  // if (valid) {
  //   //alert('valid');
  //   document.getElementsByClassName("step")[currentTab].className += " finish";
  // }
  return valid; // return the valid status
}

function checkdetails() {
  var fname, lname, mname, fname2, lname2, mname2, valid = false;

    fname = $('#first_name').val();
    lname = $('#last_name').val();
    mname = $('#middle_name').val();

    fname2 = $('#first_name2').val();
    lname2 = $('#last_name2').val();
    mname2 = $('middle_name2').val();

  if( fname == fname2 && lname == lname2) {
    return "true";
  } else {
    return "false";
  }
}





function confirmDetails() {
      var totals = $('#total_units').val();
      var units = $('#units').val();
      var wallet = $('#wallet').val();
      var PM = $('#confirm_pm').val();
      var payment_method = $('#payment_method').val();
      var pm_name = $('#confirm_wallet').val();

     // alert(PM);

       $('#unit').html(units);
      $('#final_units').html(totals);
      //$('#wallet_id').html(wallet);
      $('#PM_ac').html(wallet);
      $('#PM').html(PM);
      if(payment_method == '1') {
         $('#payment').html('internet bank method');
      } else if (payment_method == '2') {
        $('#payment').html('bank deposit');
      } else if (payment_method == '3') {
         $('#payment').html('short code');
      }
     

    }


    function vaildateBankDetails() {
         $('#first_name2').on('keyup', function(){
            //alert('first name');
             var fname = $('#first_name').val();
             var fname2 = $('#first_name2').val();
             if(fname2 == fname) {
                $('#ok_msg').show();
                $('#ferror_msg').hide();
             }else {
              $('#ok_msg').hide();
              $('#ferror_msg').show();
              $('#ferror_msg').html('Detail does not match user detail');
             }
           });

         $('#last_name2').on('keyup', function(){
           // alert('last name');
            var lname = $('#last_name').val();
             var lname2 = $('#last_name2').val();
             if(lname == lname2) {
                $('#ok_msg3').show();
                $('#ferror_msg3').hide();
                $('#nextBtn').attr('disabled',false);
             }else {
              $('#ferror_msg3').show();
              $('#ferror_msg3').html('Detail does not match user detail');
              $('#ok_msg3').hide();
              $('#nextBtn').attr('disabled',true);
             }
          });




    }


    function validatepassword() {
      $('#password').on('keyup', function(){
        var password = $('#password').val();
        if(password.length < 6){
          $('#password_msg').show();
          $('#password_msg').html("Password must be more 6char long");
          $('#password_msgok').hide();
        } else {
           $('#password_msg').hide();
            $('#password_msgok').show();
        }
      });


      $('#confirm_pass').on('keyup', function(){
        var password = $('#password').val();
        var confirm_pass = $('#confirm_pass').val();
        if(confirm_pass == password){
          $('#password_ok').show();
           $('#nextBtn').attr('disabled',false);
           $('#password_msg3').hide();
        } else {
          $('#password_ok').hide();
          $('#password_msg3').show();
          $('#password_msg3').html("Password didnt match");
           $('#nextBtn').attr('disabled',true);
        }
      });

    }

    function validateEmail() {
      
    }

