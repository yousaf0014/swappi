Payment Successfull

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
	window.opener.$('#order_id').val('<?php echo $order_id;?>');
	window.opener.$('#payment_id').val('<?php echo $payment_id;?>');
	window.opener.$('#step4-inner').html('');
	window.opener.$('#p_gateways').html('');	
	window.opener.$("#ad-create").submit(); 
	window.close();
});
</script>