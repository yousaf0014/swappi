<?php

namespace App\Http\Controllers;

use Session;
use Storage;
use Auth;
use QuickPay\QuickPay as Client;
use Illuminate\Http\Request;
use App\Http\Requests;

class PaymentController extends Controller
{
	public $order_id = 0;
    public $payment_id = null;
	
  private $_api_key;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
    # Populating API KEY
		$this->_api_key = ':bee8671648248ba2ea6a32c25eb4753d6d75c7aed8c04a83d1ac40181475e283';
	}	
	
  function sign($params) {
      $flattened_params = $this->flatten_params($params);
      ksort($flattened_params);
      $base = implode(" ", $flattened_params);

      return hash_hmac("sha256", $base, "d1d784e5c29271b6152a14c19cc475fb741607f5dfbadc220d998b856321db81");
  }

  function flatten_params($obj, $result = array(), $path = array()) {
      if (is_array($obj)) {
          foreach ($obj as $k => $v) {
              $result = array_merge($result, $this->flatten_params($v, $result, array_merge($path, array($k))));
          }
      } else {
          $result[implode("", array_map(function($p) { return "[{$p}]"; }, $path))] = $obj;
      }

      return $result;
  }
  
	/**
	*	Fetches the order details using order_id
	*
	*	@param string order_id
	*	@return mixed object
	*/	
	public function get_order_details($order_id){
		$client = new Client(":bee8671648248ba2ea6a32c25eb4753d6d75c7aed8c04a83d1ac40181475e283");

        //Create Payments
        $payment = $client->request->get("/payments", [
            'order_id' => $order_id, // Must be unique
			// 'test_mode'	=> true
        ])->asObject();
		
		return $payment;
	}


  /**
  * Fetches the order details using order_id
  *
  * @param string order_id
  * @return mixed object
  */  
  public function get_payment_id($order_id){
    $client = new Client(":d1d784e5c29271b6152a14c19cc475fb741607f5dfbadc220d998b856321db81");

        //Create Payments
        $payment = $client->request->get("/payments", [
            'order_id' => $order_id, // Must be unique
      // 'test_mode'  => true
        ])->asObject();
    
    return $payment;
  }

	
    /**
     *  Create payment and get payment link
     */
    public function payment_link($amount, $order_id, $callback = null){
        //$this->order_id = Auth::user()->id.'-'.uniqid();
        $this->order_id = $order_id;

        // See https://learn.quickpay.net/tech-talk/api/services
        $client = new Client(":bee8671648248ba2ea6a32c25eb4753d6d75c7aed8c04a83d1ac40181475e283");

        //Create Payments
        $payment = $client->request->post("/payments", [
            'order_id' => $this->order_id, // Must be unique
            'currency' => 'DKK'
        ])->asObject();
			
		if($callback != null){
			$opt = array(
				'continueurl'=> $callback,
				'amount' => $amount,
				'format'  => true
			);
		}else{
			$opt = array(
				'amount' => $amount,
				'format'  => true
			);
		}
	
        //Create/Update payment link
        $link = $client->request->put("/payments/{$payment->id}/link", $opt)->asObject();
		
        return json_encode([
            'payment_id'    => $payment->id,
            'order_id'  => $this->order_id,
            'payment_link' => $link->url
        ]);
    }

    /*
     *  Dummy method for testing
     */
	public function form(Request $request){
		// $order = new Order([
  //           'name'    => $request('name'),
  //           'address' => $request('address'),
  //           'zipcode' => $request('zipcode'),
  //           'city'    => $request('city')
  //       ]);
  //       $order->save();

        $payment_link = json_decode($this->payment_link(12345, Auth::user()->id.'-'.uniqid()));
        
        $this->payment_id = $payment_link->payment_id;

        dump($payment_link);

        //$this->render('form');
		return view('payments.form', ['payment_link' => $payment_link->payment_link]);
	}

    /**
     *  Authorize a payment from quickpay
     */
    public function payment_authorize($payment_id, $amount, $card_token){

        $client = new Client(":bee8671648248ba2ea6a32c25eb4753d6d75c7aed8c04a83d1ac40181475e283");
        $authorized = $client->request->post("/payments/{$payment_id}/authorize", [
            'amount'            => $amount,
            'card[token]'      => $card_token,
        ])->asObject();

        //"accepted" always false hence in any case return true
        return true;

    }

    /*
     *  Get Payment info check accepted true/false
     */
	public function pay($payment_id)
    {
        
        $client = new Client(":bee8671648248ba2ea6a32c25eb4753d6d75c7aed8c04a83d1ac40181475e283");

        //Get Payment
        $payment = $client->request->get("/payments/{$payment_id}")->asObject();

        //Create a log file for the payment
        //file_put_contents(public_path().'/uploads/'.$payment_id.'-file.txt', json_encode($payment));
        
        if ($payment->accepted) {
            return $payment;
        } else {
            return false;
        }
    }
    
  //   function get_payment_link(Request $request){

  //     $opt = array(
  //       'amount' => $request->post('total_amount'),
  //       'format'  => true
  //     );

  //     $client = new Client($this->_api_key);

  //     # Randomizing orderID
  //     $this->order_id = $request->post('order_id');

  //     $payment = $client->request->post("/payments", [
  //         'order_id' => $this->order_id, // Must be unique
  //         'currency' => 'DKK'
  //     ])->asObject();
    

      
    
  //     //Create/Update payment link
  //     $link = $client->request->put("/payments/{$payment->id}/link", $opt)->asObject();
  
  //     return json_encode([
  //         'payment_id'    => $payment->id,
  //         'order_id'  => $this->order_id,
  //         'payment_link' => $link->url
  //     ]);
  //   }

  // /**
  //  * Generates randomized orderID for paypal and mobilepay payments
  //  * 
  //  * @param  integer $length Length of the random string
  //  * @return string          Random order_id
  //  */
  // protected function _generate_order_id($length = 10) {
  //   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  //   $charactersLength = strlen($characters);
  //   $randomString = '';

  //   for ($i = 0; $i < $length; $i++) {
  //       $randomString .= $characters[rand(0, $charactersLength - 1)];
  //   }

  //   $randomString = 'ODR-'.$randomString;
    
  //   return $randomString;
  // }
}
