<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Redirect to Payment - Swappi ApS</title>
	<meta name="description" content="@yield('metaDescription')">
	<meta name="keywords" content="@yield('metaKeywords')">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 jumbotron" style="margin-top: 50px;">
				<p class="text-center">Redirecting...</p>
				<form id="payto" class="hide" method="POST" action="https://payment.quickpay.net">
				    <input type="hidden" name="version" value="{{ $params['version'] }}">
				    <input type="hidden" name="merchant_id" value="{{ $params['merchant_id'] }}">
				    <input type="hidden" name="agreement_id" value="{{ $params['agreement_id'] }}">
				    <input type="hidden" name="order_id" value="{{ $params['order_id'] }}">
				    <input type="hidden" name="amount" value="{{ $params['amount'] }}">
				    <input type="hidden" name="currency" value="{{ $params['currency'] }}">
				    <input type="hidden" name="continueurl" value="{{ $params['continueurl'] }}">
				    <input type="hidden" name="cancelurl" value="{{ $params['cancelurl'] }}">
				    <input type="hidden" name="callbackurl" value="{{ $params['callbackurl'] }}">
				    <input type="hidden" name="checksum" value="{{ $params['checksum'] }}">
				    
				    <input type="hidden" name="variables[package]" value="{{ $params['variables']['package'] }}">
				    <input type="hidden" name="variables[_token]" value="{{ $params['variables']['_token'] }}">
				    
				    <input type="submit" id="submit" name="submit" value="Continue to payment...">
				</form>
			</div>
		</div>
	</div>
	  
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript">
		setTimeout(function(){
			//$('#payto #submit').click();
		}, 3000);
	</script>
</body>
</html>