<div class="panel panel-primary">
  <div class="panel-heading">
      <h4 class="pull-left">Payment Info</h4>
      <a href="javascript:;" onclick="jQuery('#myModal').modal('hide');" class="glyphicon glyphicon-remove-circle pull-right text-primary f20"></a>
      <div class="clearfix"></div>
  </div>
  <div class="panel-body">
          
          <div id="hidden_form">
              <form method="POST" action="https://payment.quickpay.net">
                <input type="hidden" id="version" name="version" value="v10">
                <input type="hidden" id="merchant_id" name="merchant_id" value="16544">
                <input type="hidden" id="agreement_id" name="agreement_id" value="145565">
                <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id;?>">
                <input type="hidden" name="amount" id="total_amount" value="<?php echo $amount;?>">
                <input type="hidden" id="currency" name="currency" value="DKK">
                <input type="hidden" id="payment_methods" name="payment_methods" value="<?php echo $method;?>">
                <input type="hidden" id="continueurl" name="continueurl" value="{{$continueurl}}">
                <input type="hidden" id="cancelurl" name="cancelurl" value="{{$cancelurl}}">
                <input type="hidden" id="callbackurl" name="callbackurl" value="{{$callback}}">
                <input type="hidden" name="checksum" id="checksum" value="<?php echo $checksum;?>">
                <input type="submit" id="submit_button" value="Continue to payment...">
              </form>                
          </div>
      
  </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">//added for new gallery changes 2017-04-26
  $(document).ready(function() {
      $('#submit_button').trigger('click');
  });
</script>
