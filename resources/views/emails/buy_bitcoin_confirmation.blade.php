<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
</head>
<body>
	<p>Dear {!! $user->first_name !!},</p>

	<p>Thank you for ordering with BetaExchangeNg.com.</p>

	<p>Your order summary:</p>

	<div>
		<b>Order Number: </b> <em>{!! $ref_no !!}</em>
		<br>
		<b>Your Wallet ID: </b> <em>{!! $wallet_id !!}</em>
		<br>
		<b>Units ($): </b> <em>{{ $units }}</em>
		<br>
		<b>Total (₦): </b> <em>{{ $total_units }}</em>
		<br>

		<b>payment Method: </b> <em>{{ $method }}</em>
	</div>

	<p>Payment Instructions:</p>

	<p>Please pay to First Bank</p>

	<div>
		@foreach($bank_details as $account)
			<b>Our Account Name: </b> <em>{!! $account->account_name !!}</em>
			<br>
			<b>Account Number: </b> <em>{!! $account->account_no !!}</em>
			<br>
			<b>Bank Name: </b> <em>{!! $account->bank_name !!}</em>
			<br>
			<b>Total (₦) : </b> <em>{{ $total_units }}</em>
			<br>
			<b>Depositor Name/Naration/Reference: </b> <em>{!! $ref_no !!}</em>
		@endforeach	
	</div>

	<p>Please note that we will not be responsible for funding a wrong account provided by you and always ensure your computer is secure.</p>

	<p style="color: #ff0000;">
		<strong>IMPORTANT!!!</strong>
		After Payment is made to our account, Make sure you sign into your dashboard at BetaExchangeNg.com and click the 'Send Alert' beside your order detail, if not, we will not get your order and it might not be processed.
	</p>

	<p>For more info/help, call or Whatsapp the phone numbers below.</p>

	<div style="color: #006600">
		<b>Regards,</b>
		<br>
		<br>
		<b>BetaExchangeNg</b>
		<br>
		<b>Tel: 0909-190-9346, 0803-801-4771.</b>
		<br>
		<b>WhatsApp: 0909-190-9346</b>
		<br>
		<b>Website:</b> <a style="text-decoration: none" href="http://www.betaexchangeng.com">www.betaexchangeng.com</a>
	</div>

</body>
</html>
