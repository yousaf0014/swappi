<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pages;

class PageController extends Controller
{
	
	/**
	 * Contact Us page 
	 * @return unknown
	 */
	public function contact(){
		return view('pages.contact');
	}
	
	/**
	 * Send contact post email
	 * @param Request $request
	 */
    public function contact_send(Request $request){
    	
    	$data = [
    		'email'		=> $request->input('email'),
    		'name'		=> $request->input('name'),
    		'msg'		=> $request->input('message'),
    	];
    	
    	Mail::send('emails.contact', $data, function ($message) use ($data) {
    		$message->from($data['email'], $data['name'])->to(config('constants.INFO_EMAIL'))
    		->bcc('frederik_wind@hotmail.com')->cc('brian@whyorange.dk')
    		->subject('Swappi Contact Us');
    	});
    	
    	if( count(Mail::failures()) > 0 ) {
		   echo "There was one or more failures. They were: <br />";
		   exit;
		   foreach(Mail::failures() as $email_address) {
		       echo " - $email_address <br />";
		    }
		}

    	Session::flash('success', 'Din besked er blevet indsendt');
    	return redirect('contact-us');
	}
	
	/**
	 * About Us page
	 * @return unknown
	 */
	public function about(){
		return view('pages.about');
	}
	
	/**
	 * Help page
	 * @return unknown
	 */
	public function help(){
		return view('pages.help');
	}
	
	/**
	 * Vacancies page
	 */
	public function vacancies(){
		return view('pages.vacancies');
	}
	
	/**
	 * Press page
	 */
	public function press(){
		return view('pages.press');
	}
	
	/**
	 * Blog page
	 */
	public function blog(){
		return view('pages.blog');
	}
	
	/**
	 * Safe e Swappi page
	 */
	public function safe_swappi(){
		return view('pages.safe-swappi');
	}
	
	/**
	 * Terms of use Page
	 */
	public function terms_of_use(){
		return view('pages.terms-of-use');
	}
	
	/**
	 * Rules for advertising Page
	 */
	public function rules_for_advertising(){
		return view('pages.rules-for-advertising');
	}
	
	/**
	 * Privacy Policy Page
	 */
	public function privacy_policy(){
		return view('pages.privacy-policy');
	}
	
	/**
	 * Swappi Business webshops Page
	 */
	public function webshops(){
		return view('pages.webshops');
	}
	
	/**
	 * Swappi Business Admanager Page
	 */
	public function admanager(){
		return view('pages.admanager');
	}
	
	/**
	 * Swappi Business banner ads Page
	 */
	public function banner_ads(){
		return view('pages.banner-ads');
	}
	
	/**
	 * Business Page
	 */
	public function business(){
		return view('pages.business');
	}

	/**
	 * Tilfredsbarometer Page
	 */
	public function tilfredsbarometer(){
		return view('pages.tilfredsbarometer');
	}

	/**
	 *	Hvorfor Swappi Page
	 */
	public function hvorfor_swappi(){
		return view('pages.hvorfor-swappi');
	}
	
	/**
	 *	Cookie Politik Page
	 */
	public function cookie_politik(){
		return view('pages.cookie-politik');
	}
	
	/**
	 *	Cookie Politik Page
	 */
	public function tillidsbarometer(){
		return view('pages.tillidsbaromete');
	}
	
	/**
	*	Router for displaying pages
	*
	*	@param string page identifier
	*	@return void
	*/
	public function common_page_router($page_name){
	
		$page = Pages::where('page_identifier', $page_name)->get()->first();
		
		if(empty($page)){
			 return response()->view('errors.404', [], 404); 
		}
		
		return view('pages.help', [
			'content' => $page,
		]);
	}
}
