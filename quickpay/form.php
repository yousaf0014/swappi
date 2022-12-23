<?php
  function sign($params, $api_key) {
      $flattened_params = flatten_params($params);
      ksort($flattened_params);
      $base = implode(" ", $flattened_params);

      return hash_hmac("sha256", $base, $api_key);
  }

  function flatten_params($obj, $result = array(), $path = array()) {
      if (is_array($obj)) {
          foreach ($obj as $k => $v) {
              $result = array_merge($result, flatten_params($v, $result, array_merge($path, array($k))));
          }
      } else {
          $result[implode("", array_map(function($p) { return "[{$p}]"; }, $path))] = $obj;
      }

      return $result;
  }

  $params = array(
    "version"      => "v10",
    "merchant_id"  => 16544,
    "agreement_id" => 59367,
    "order_id"     => "0002",
    "amount"       => 100,
    "currency"     => "DKK",
    "continueurl" => "http://shop.domain.tld/continue",
    "cancelurl"   => "http://shop.domain.tld/cancel",
    "callbackurl" => "http://shop.domain.tld/callback",
    
  );

  $params["checksum"] = sign($params, "ae6c729e07722f588663d4e16ca3d12ee7936789c4103b616374142a8c4872f3");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quickpay Test</title>
</head>
<body><!--  -->
  <form method="POST" action="https://payment.quickpay.net">
    <input type="hidden" name="version" value="<?php echo $params["version"]; ?>">
    <input type="hidden" name="merchant_id" value="<?php echo $params["merchant_id"]; ?>">
    <input type="hidden" name="agreement_id" value="<?php echo $params["agreement_id"]; ?>">
    <input type="hidden" name="order_id" value="<?php echo $params["order_id"]; ?>">
    <input type="hidden" name="amount" value="<?php echo $params["amount"]; ?>">
    <input type="hidden" name="currency" value="<?php echo $params["currency"]; ?>">
    <input type="hidden" name="continueurl" value="<?php echo $params["continueurl"]; ?>">
    <input type="hidden" name="cancelurl" value="<?php echo $params["cancelurl"]; ?>">
    <input type="hidden" name="callbackurl" value="<?php echo $params["callbackurl"]; ?>">
    <input type="hidden" name="checksum" value="<?php echo $params["checksum"]; ?>">
    <input type="submit" name="submit" value="Continue to payment...">
  </form>
</body>
</html>