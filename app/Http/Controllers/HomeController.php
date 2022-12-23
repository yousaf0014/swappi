<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\User;
use App\Category;
use App\Ad;
use App\AdSwap;
use App\AdFavorite;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailChimpController;
use Auth;
use DB;
use App\Connection;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function confirm_email(){
    	return view('home.confirm_email');
    }

    /*****

	* Activate User profile on email confirmation
	*/

	function activate($userId,$active,$code){
		$user = User::where('status',0)->where('id',$userId)->where('created_timestamp',$code)->first();
		if(!empty($user)){
			$data['id'] = $user->id;
			$data['status'] = 1;
			if(User::where('id', $user->id)->update($data)){
				Auth::login($user);
				\Session::put('first_login',1);
				return redirect('profile/');
			}
		}
		return redirect('/');		
	}

    public function index()
    {
        //get swaped ad ids
        $ads_swaped = AdSwap::where('status', '=', 1)->get()->pluck('ad_id');

		//getting Grafiker
        //get categories for search input
    	$cat = Category::where('status', 1)->limit(7)->get();
		
		$i = 0;
		foreach($cat as $c){
			$categories[$i] = $c;
			
			if($i == 2){
				$categories[$i] = Category::where('categoryName', 'grafiker')->get()->first();
			}
			
			$i++;
		}
		
		
        //get 8 categories
    	$rightCategories = Category::limit(8)->inRandomOrder()->get();
    	
        //get users for featured section and carousel
        $users = User::whereNull('role')->with('friendsOfMine')->with('friendOf')->where('status', 1)->inRandomOrder()->get();
       // dd($users);
    	//get 2 featured ads
        $featuredAds = Ad::with('transactions')
    		->limit(2)
    		->where('status', 1)
            ->whereNotIn('id', $ads_swaped)
    		->inRandomOrder()
    		->whereHas('transactions', function($query){
    			// Now querying on transactions
    			$query->where('transactions.endDate', '>', Carbon::now())
    			->where('transactions.txnType', 'premium');
    		})
    		->get();
        //get ads for carousel
    	$carouselAds = Ad::with('transactions')
    		->where('status', 1)
            ->whereNotIn('id', $ads_swaped)
    		->inRandomOrder()
    		->whereHas('transactions', function($query){
				// Now querying on transactions
				$query->where('transactions.endDate', '>', Carbon::now())
					->where('transactions.txnType', 'premium');
			})
			->limit(10)
			->get();
		// $i = 0;

		// foreach ($carouselAds as $cads) {
		// 	if($this->check_favorite($cads['id']) == true){
		// 		$carouselAds[$i]['isFav'] = true;
		// 	} else {
		// 		$carouselAds[$i]['isFav'] = false;
		// 	}
		// 	$i++;
		// }
		// $carouselAds = json_decode(json_encode($carouselAds));	

		
        return view('home', [
        	'categories'		=> $categories,
        	'rightCategories'	=> $rightCategories,
        	'featuredAds'		=> $featuredAds,
        	'carouselAds'		=> $carouselAds,
        	'users'				=> $users,
        	'connections'		=> 0
        ]);
    }

    public function get_categories(){

        //get 8 categories
        $categories = Category::where('status', 1)->orderby('adsCount', 'DESC')->paginate(8);

        return view('common.home_categories', [
            'categories'   => $categories,
        ]);

    }

    private function _check_connection($to_user, $from_user){
		$count = Connection::where([
				'follower_id'	=> $to_user,
				'user_id'		=> $from_user
			])
			->orWhere([
				'user_id'		=> $to_user,
				'follower_id'	=> $from_user
			])
			->count();
		return $count;
	}

    /**
    *	Check if an ad is favorited by the current logged user
    *
    *	@param var int ad_id
    *	@return boolean 
    */
    function check_favorite($ad_id){

    	if (Auth::check()) {
    		$userId = Auth::id();
    		$check = DB::table('ad_favorite')
    			->where('ad_id', $ad_id)
    			->where('user_id', $userId)->get();

    		if (count($check)) {
    			return true;
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }

    public function hold_register(Request $request){
        Session::flash('email', $request->input('email'));
        Session::flash('pass_secret', $request->input('password'));
        return redirect('register#step/2');
    }
	
	/**
	*	Serves subscription request using mailchimp
	*
	*	@return json_array
	*/
	public function subscribe(Request $request){
		
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
		]);
		
		if ($validator->fails()){
			$return = [
				'status' => false,
				'message'	=> '',
				'data' => $validator->errors()
			];
		
			return json_encode($return);
		}
		
		$data = [
			'email_address' => $request->input('email'),
			'status'        => 'subscribed', 			// "subscribed","unsubscribed","cleaned","pending"
		];
		
		
		$mailchimp = new MailChimpController();
		$check = $mailchimp->check_if_exists($data['email_address']);
		$check = json_decode($check);
		if($check->status == 'subscribed'){
			$return = [
				'status' => false,
				'message' => 'You are already subscribed!',
				'data'	=> ''
			];
		}else{
			$create = $mailchimp->create($data);
			$create = json_decode($create);
			if($create->status == 'subscribed'){
				$return = [
					'status' => true,
					'message' => 'Thank you for subscribing'
				];
			} else {
				$return = [
					'status' => false,
					'message' => 'Something went wrong',
					'data'	=> ''
				];
			}
		}
		
		return json_encode($return);
	}
	
	
}
