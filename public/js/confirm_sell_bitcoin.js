$(document).ready(function(){
	$('#msg').hide();

	$('#confirm_sell_bitcoin').on('submit', function(e) {
		e.preventDefault();
		$('#confirm_bit_sell').model('hide');
		let data = $(this).serialize();
		let url = $(this).attr('action');

		$.post(url,data,function(response){
			console.log(response);

			//alert(response.hash);
		});
		
		
	})
})