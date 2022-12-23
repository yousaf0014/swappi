<!DOCTYPE html>
<html>
<head>
	<title>Quick Pay Embedded </title>
</head>
<body>
	<center>
		<form id="checkout-form" class="form-horizontal" action="embedded-process.php" method="post">
		  <div>
		    <label for="name">Name</label>
		    <input type="text" name="name" value="">
		  </div>
		  <div>
		    <label for="address">Address</label>
		    <input type="text" name="address" value="">
		  </div>
		  <div>
		    <label for="zipcode">Zipcode</label>
		    <input type="text" name="zipcode" value="">
		  </div>
		  <div>
		    <labe for="city">City</label>
		    <input type="text" name="city" value="">
		  </div>
		  <div class="card">
		    <label>Card number</label>
		    <div class="card">
		      <div class="card-brand"></div>
		      <input type="text" autocomplete="off" data-quickpay="cardnumber">
		    </div>
		  </div>
		  <div style="margin-right: 45px;">
		    <label>Expiration</label>
		    <input type="text" placeholder="MM / YY" autocomplete="off" data-quickpay="expiration">
		  </div>
		  <div style="margin-right: 0px;">
		    <label>CVV/CVD</label>
		    <input type="text" maxlength="4" autocomplete="off" data-quickpay="cvd">
		  </div>
		  <div>
		    <button class="btn btn-primary" type="submit">Pay</button>
		  </div>
		</form>
	</center>

	<style type="text/css">
		center {
		    width: 450px;
		    margin: 0 auto;
		    text-align: left;
		}
		.btn-primary{
			background: #ffffff;
			border: 1px solid #dddddd;
			color: #282828;
			padding: 5px 15px;
			cursor: pointer;
			box-shadow: 0px 1px 2px #ddd;
		}
		#checkout-form div input[type="text"] {
		    border: 1px solid #dddddd;
		    padding: 5px 5px;
		}
	  #checkout-form div {
	      float: left;
	      width: 200px;
	      margin: 0 45px 15px 0;
	  }
	  #checkout-form div:nth-child(2n) {
	      margin-right: 0;
	  }
	  #checkout-form div.card{
	    width: 440px;
	  }
	  #checkout-form {
	      float: left;
	      width: 450px;
	  }
	  #checkout-form div label, #checkout-form div input {
	      float: left;
	      width: 100%;
	      padding: 5px 0;
	  }
	  .card {
	    position: relative;
	  }

	  .card-brand {
	    position: absolute;
	    right: 5px;
	    top: 5px;
	    font-weight: bold;
	    width: auto !important;
	    margin: 0 !important;
	  }

	  input.error {
	    border: 1px solid red;
	  }
	</style>

	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://payment.quickpay.net/embedded/v1/quickpay.js"></script>
	
	<script type="text/javascript">
	  QuickPay.Embedded.Form(document.querySelector("#checkout-form"), {
	  	merchant_id: 16544,
	    agreement_id: 59367,
	    payment_link: "https://payment.quickpay.net/payments/abee7c551dfd98ca4ed76421c182ef71a06854b98801e581820a0a533a7a0122",
	    brandChanged: function(brand) {
	      document.querySelector(".card-brand").innerHTML = brand;
	    },
	    beforeCreate: function(form) {
	      var button = document.querySelector("#checkout-form button");
	      button.setAttribute("disabled", "disabled");
	      button.innerHTML = "Please wait...";
	    },
	    validChanged: function(form, isValid, fields) {
	      if (isValid) {
	        var inputs = document.querySelectorAll("input.error");
	        for (var i = 0; i < inputs.length; i++) {
	          inputs[i].classList.remove("error");
	        }
	      }
	    },
	    success: function(form, data) {
	      return true; // Return false to prevent form submit
	    },
	    failure: function(form, type, message, data) {
	      switch (type) {
	        case "validation":
	          for (var i = 0; i < data.length; i++) {
	            document.querySelector('input[data-quickpay=' + data[i] + ']').classList.add('error');
	          }
	          break;
	        default:
	          alert(type + ': ' + message);
	      }

	      document.querySelector("#checkout-form button").innerHTML = "Pay";
	    }
	  });
	</script>
</body>
</html>