<?php
namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class MailChimpController extends Controller
{
	/**
	*	@var string MAILCHIMP API KEY
	**/
	private $_api_key;
	
	/**
	*	@var string MAILCHIMP LIST ID
	**/
	private $_list_id;
	
	public function __construct(){
		$this->_api_key = config('constants.MAILCHIMP_API_KEY');
		$this->_list_id = config('constants.MAILCHIMP_LIST_ID');
	}
	
	/**
	*	Sends PUT request to add new subscriber to the list
	*	
	*	@param array 
	*	@return json_array
	*/
	public function create($data) {
		
		$memberId = md5(strtolower($data['email_address']));
		$dataCenter = substr($this->_api_key, strpos($this->_api_key,'-')+1);
		$url = 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/' . $this->_list_id . '/members/' . $memberId;

		$json = json_encode($data);

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $this->_api_key);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 
		$result = curl_exec($ch);
		// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		return $result;
	}
	
	/**
	*	Sends GET request to check where the 
	*	subscriber exists
	*
	*	@param string email
	*	@return json_array
	*/
	public function check_if_exists($email) {
		
		$memberId = md5(strtolower($email));
		$dataCenter = substr($this->_api_key, strpos($this->_api_key,'-')+1);
		
		$url = 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/' . $this->_list_id . '/members/' . $memberId;
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $this->_api_key);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		                                                                                                             
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;
	}
	
}