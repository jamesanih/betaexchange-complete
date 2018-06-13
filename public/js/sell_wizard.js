function nextPrev() {
	$('.form').hide();
	$('.form2').show();
	$('#prevBtn').show();
	$('#nextBtn').hide();

	var result = check();
	if(result == "false") {
		 $('#nextBtn').attr('disabled',false);
	} else {
		 $('#nextBtn').attr('disabled',true);
	}
	
}


function prev() {
	$('.form2').hide();
	//$('#btnsubmit').hide();
	$('.form').show();
	$('#prevBtn').hide();
	$('#nextBtn').show();
	
}


function check() {
	var unit = $("#unit").val();
	var bank_ac_name = $('#account_name').val();
	var ac_no = $('#account_no').val();
	var email = $('#email').val();
	var phone_no = $('#phone_no').val();

	//alert(unit + bank_ac_name + ac_no + email + phone_no);
	//var bank_name = $('#bank_name').val();

	if(unit == "" || bank_ac_name == "" || ac_no == "" || email == "" || phone_no == "") {
		return "false"
	} else {
		return "true";
	}
}