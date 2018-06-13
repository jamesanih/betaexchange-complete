<!DOCTYPE html>
<html>
<head>
	<title>Sell Perfect</title>
</head>
<body>
<h4>This User <b>{!! $user->account_name!!}</b> with the phone number <b>{!! $user->phone_no !!}</b> will love to sell {!! $user->unit !!} units of {{ $ctype }}, to us. Please try to respond as soon as possible.</h4>
<br>

<h3>Details are as follows</h3>

<h4>Account Name: {!! $user->account_name !!}</h4>
<h4>Bank Name: {!! $user->bank_name !!}</h4>
<h4>Phone No: {!! $user->phone_no !!}</h4>
<h4>Email: {!! $user->email !!}</h4>
<h4>Units: {!! $user->unit !!}</h4>
<h4>Price: {!! $user->price !!}</h4>
<h4>Total: {!! $user->total !!}</h4>

<br>
<br>
<br>
<h5>Thanks Mgt</h5>
</body>
</html>
