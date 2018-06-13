<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
</head>
<body>
	<p> {!! $user->first_name !!}  {!! $user->middle_name !!} {!! $user->last_name !!} with user id of {!! $user->user_id !!}</p>
	
	<p>Just Confirmed the {!! $title !!} he/she sold to you, please response </p>
	

	<p>Confirm order summary:</p>

	<div>

		<b>Date sent: </b> <em>{!! $date_sent !!}</em>
		<br>
		<b>Hash </b> <em>{!! $hash !!}</em>
		<br>
		<b>Amount:</b> <em>{!! $amount_sent !!}</em>
		<br>
		<b>Wallet ID</b> <em>{!! $wallet_id !!}</em>
	</div>

	
	
	
</body>
</html>
