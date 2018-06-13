$(function	()	{



	
	//Form Wizard 2
	var currentStep_2 = 1; 
	
	$('.wizard-demo li a').click(function()	{
		alert('You must enter your information')
		//return false;
	});
	 


	
	$('#formValidate2').parsley( { listeners: {
        onFormSubmit: function ( isFormValid, event ) {
            if(isFormValid)	{
				alert('Your message has been sent');
				return false;
			}
        }
    }}); 

	
	$('#formWizard2').parsley( { listeners: {
		onFieldValidate: function ( elem ) {
			// if field is not visible, do not apply Parsley validation!
			if ( !$( elem ).is( ':visible' ) ) {
				return true;
			}

			return false;
		},
        onFormSubmit: function ( isFormValid, event ) {
            if(isFormValid)	{
					
				currentStep_2++;
				
				if(currentStep_2 == 2)	{

					$('#account_no').bind('input propertychange', function() {
					    var data = $('#account_no').val();
					    var number = data.substring(1,);

					    if (data.charAt(0) === "U"){

					    	if (isNaN(number)) {

						    	var timer;
						    	$('#account_no').val(data);
						    	clearTimeout(timer);

						    	timer = setTimeout(function(){
						    		$('#account_no').val(data.slice(0,-1))
						    	},200);

					    	}

					    } else {
					    	var timer;
					    	$('#account_no').val(data);
						    clearTimeout(timer);
						    timer = setTimeout(function(){
						    	$('#account_no').val("U")
						    },200);
					    }
					});

					$('#wizardDemo2 li:eq(1) a').tab('show');
					
					$('#prevStep2').attr('disabled',false);
					$('#prevStep2').removeClass('disabled');
				}
				else if(currentStep_2 == 3)	{
					$('#wizardDemo2 li:eq(2) a').tab('show');
				}
				else if(currentStep_2 == 4)	{

					function confirmDetails() {
						var unit = $('#units').val();
						var totalUnit = $('#total_units').val();
						var wallet = $('#wallet').val();
						var paymentMethod = $('#payment_method').val();
						var accountNo = $('#account_no').val();
						var accountName = $('#account_name').val();

						$('#unit_field').html(unit);
						$('#total_unit_field').html(totalUnit);
						$('#wallet_id_field').html(wallet);
						$('#perfect_money_account_no').html(accountNo);
						$('#perfect_money_account_name').html(accountName);

						if(paymentMethod == "1"){
							paymentMethod = "Internet Bank Transfer";

						}else if (paymentMethod == "2"){
							paymentMethod = "Bank Deposit"

						}else if (paymentMethod == "3"){
							paymentMethod = "Short Code"
						}

						$('#payment_method_field').html(paymentMethod)
					}

					confirmDetails();
					
					$('#wizardDemo2 li:eq(3) a').tab('show');
					
					$('#nextStep2').attr('disabled',true);
					$('#nextStep2').addClass('disabled');
				}
				else {
                        return true;
                    }
				
				return false;
			}
        }
    }});

	
	$('#prevStep2').click(function()	{
		
		currentStep_2--;
		
		if(currentStep_2 == 1)	{
		
			$('#wizardDemo2 li:eq(0) a').tab('show');
				
			$('#prevStep2').attr('disabled',true);
			$('#prevStep2').addClass('disabled');
			
		}
		else if(currentStep_2 == 2)	{
			$('#wizardDemo2 li:eq(1) a').tab('show');
		}
		
		else if(currentStep_2 == 3)	{
		
			$('#wizardDemo2 li:eq(2) a').tab('show');
					
			$('#nextStep2').attr('disabled',false);
			$('#nextStep2').removeClass('disabled');
			
		}
		
		return false;
	});
});