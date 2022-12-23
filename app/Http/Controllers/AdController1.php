<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Auth;
use Session;
use Carbon\Carbon;
use App\Ad;
use App\AdImage;
use App\AdSkill;
use App\User;
use App\Category;
use App\AdFavorite;
use App\Skill;
use App\Transaction;
use App\AdSwap;
use App\Connection;
use App\Review;
use QuickPay\QuickPay;
use Illuminate\Http\Request;
use App\Repositories\AdRepository;
use App\Http\Requests;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Repositories\MessageRepository;
use App\Http\Controllers\MessageController;
use App\Packages;

class AdController extends Controller
{
	
	/**
	 * The ad repository instance.
	 *
	 * @var AdRepository
	 */
	protected $ads;
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AdRepository $ads)
	{
		$this->ads = $ads;
		//$this->middleware('auth');
	}	
		
	/*
	 * All mine Ads for the logged in user 
	 */
	public function index(Request $request)
	{	
		$ads = $this->ads->forUser($request->user());
		
		$allAds = Ad::where([
			['user_id', Auth::user()->id]
		])->count();
		$activeAds = Ad::where([
			['status', '1'],
			['user_id', Auth::user()->id]
		])->count();
		$inactiveAds = Ad::where([
			['status', '0'],
			['user_id', Auth::user()->id]
		])->count();
		
		// dd($ads);
		return view('ad.index', [
			'ads'			=> $ads,
			'allAds'		=> $allAds,
			'activeAds'		=> $activeAds,
			'inactiveAds'	=> $inactiveAds
		]);
	}
	
	/*
	 * Mine Active Ads for the logged in user
	 */
	public function active_ads(Request $request)
	{
		$ads = $request->user()->ads()
			->where('status', '1')
			->get();
	
		$allAds = Ad::where([
			['user_id', Auth::user()->id],
			['status', '1']
		])->count();
		$activeAds = Ad::where([
			['status', '1'],
			['user_id', Auth::user()->id]
		])->count();
		$inactiveAds = Ad::where([
			['status', '0'],
			['user_id', Auth::user()->id]
		])->count();
		return view('ad.index', [
			'ads'			=> $ads,
			'allAds'		=> $allAds,
			'activeAds'		=> $activeAds,
			'inactiveAds'	=> $inactiveAds
		]);
	}
	
	/*
	 * Mine Inactive Ads for the logged in user
	 */
	public function inactive_ads(Request $request)
	{
		$ads = $request->user()->ads()
			->where('status', '0')
			->get();
		
		$allAds = Ad::where([
			['user_id', Auth::user()->id],
			['status', '0']
		])->count();
		$activeAds = Ad::where([
			['status', '1'],
			['user_id', Auth::user()->id]
		])->count();
		$inactiveAds = Ad::where([
			['status', '0'],
			['user_id', Auth::user()->id]
		])->count();
		return view('ad.index', [
			'ads'			=> $ads,
			'allAds'		=> $allAds,
			'activeAds'		=> $activeAds,
			'inactiveAds'	=> $inactiveAds
		]);
	}
	
	/*
	 * Ad detail page
	 */
	public function detail($ad)
	{
		$ad = Ad::where('id', '=', $ad)->get();
		$featured = '';
		foreach ($ad[0]->adImages as $image){
			if($image->isFeatured){
				$featured = $image->image;
			}
		}
		$user = User::where('id', $ad[0]->user->id)->get();
		
		//get swaped ad ids
        $ads_swaped = AdSwap::where('status', '=', 1)->get()->pluck('ad_id');

		$ads = Ad::select('ads.*','ad_skill.category_id')
				->limit(3)
		   		->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
				->with('transactions')
				->where('ads.status', 1)
				->whereNotIn('ads.id', $ads_swaped)
				->whereHas('transactions', function($query){
					// Now querying on transactions
					$query->where('endDate', '>', Carbon::now())
							->where('txnType', '!=', 'free');
				})
				->inRandomOrder()->get();

		$featured = $featured == '' ? $ad[0]->adImages[0]->image : $featured;
		
		$rightCategories = Category::where('status', '=', 1)->limit(3)->inRandomOrder()->get();
		$connections = Connection::where([
					['user_id', $ad[0]->user->id],
					['status', '!=', 0]
				])->orWhere([
					['follower_id', $ad[0]->user->id],
					['status', '!=', 0]
				])->get();

		$swap = AdSwap::where('ad_id', $ad[0]->id)->get();
		
		return view('ad.detail',[
			'ad'		=> $ad[0],
			'featured'	=> $featured,
			'user'		=> $user[0],
			'connections'	=> $connections,
			'ads'		=> $ads,
			'rightCategories' => $rightCategories,
			'swap'		=> $swap
		]);
	}
	
	/*
	 * Ad search page
	 */
	public function search(Request $request)
	{
		$adIds = [];
		
		DB::enableQueryLog();

		//get swaped ad ids
		$ads_swaped = AdSwap::where([
				['status', '=', 1],
				// ['ad_owner_id', '!=', Auth::user()->id],
				// ['ad_swaper_id', '!=', Auth::user()->id]
			])->get()->pluck('ad_id');
		
		//if(isset($request->find)){
			if($request->ad_search){
				if($request->ad_search != ''){
					$ids = Ad::select('id')->where('adHeadline', 'like', '%' . $request->ad_search . '%')
						->orWhere('adDescription', 'like', '%' . $request->ad_search . '%')
						->where('status', 1)
						->whereNotIn('id', $ads_swaped)
						->get()
						->pluck('id');
					foreach($ids as $id){
						$adIds[] = $id;		
					}
				} 
			}
			if($request->skills){
				$ids = Ad::select('ads.id')->addSelect(DB::raw('ad_skill.id as ad_skill_id'))
					->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
					->whereIn('skill_id', $request->skills)
					->where('status', 1)
					->whereNotIn('id', $ads_swaped)
					->get()
					->pluck('id');
				foreach($ids as $id){
					$adIds[] = $id;
				}
			}
			if($request->categories){
				$ids = Ad::select('ads.id')->addSelect(DB::raw('ad_skill.id as ad_skill_id'))
					->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
					->whereIn('category_id', $request->categories)
					->where('status', 1)
					->whereNotIn('ads.id', $ads_swaped)
					->get()
					->pluck('id');
				foreach($ids as $id){
					$adIds[] = $id;
				}
			}
			if($request->ad_search != ''){
				$ads = Ad::with('transactions')
					->whereIn('id', $adIds)
					->where('ads.status', 1)
					->whereHas('transactions', function($query){
						// Now querying on transactions
						$query->where('endDate', '>', Carbon::now());
					})
					->paginate(20);


			}else{
				$ads = Ad::with('transactions')
					// ->whereIn('id', $adIds)
					->where('ads.status', 1)
					->whereHas('transactions', function($query){
						// Now querying on transactions
						$query->where('transactions.endDate', '>', Carbon::now());
					})
					->whereNotIn('id', $ads_swaped)
					->paginate(20);
					// dump(DB::getQueryLog()); die;
			}
		
		// dd($ads);

		$skills = Skill::where('status', 1)->get();
		$categories = Category::where('status', 1)->get();
		
		return view('ad.search',[
			'fields'		=> $request->all(),
			'skills'		=> $skills,
			'categories'	=> $categories,
			'ads'			=> $ads
		]);
	}

	public function get_ads(Request $request)
	{
		$adIds = [];
		
		DB::enableQueryLog();

		//get swaped ad ids
		$ads_swaped = AdSwap::where([
				['status', '=', 1],
				// ['ad_owner_id', '!=', Auth::user()->id],
				// ['ad_swaper_id', '!=', Auth::user()->id]
			])->get()->pluck('ad_id');
		
		//if(isset($request->find)){
			if($request->ad_search){
				if($request->ad_search != ''){
					$ids = Ad::select('id')->where('adHeadline', 'like', '%' . $request->ad_search . '%')
						->orWhere('adDescription', 'like', '%' . $request->ad_search . '%')
						->where('status', 1)
						->whereNotIn('id', $ads_swaped)
						->get()
						->pluck('id');
					foreach($ids as $id){
						$adIds[] = $id;		
					}
				}
			}
			if($request->skills){
				$ids = Ad::select('ads.id')->addSelect(DB::raw('ad_skill.id as ad_skill_id'))
					->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
					->whereIn('skill_id', $request->skills)
					->where('status', 1)
					->whereNotIn('id', $ads_swaped)
					->get()
					->pluck('id');
				foreach($ids as $id){
					$adIds[] = $id;
				}
			}
			if($request->categories){
				$ids = Ad::select('ads.id')->addSelect(DB::raw('ad_skill.id as ad_skill_id'))
					->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
					->whereIn('category_id', $request->categories)
					->where('status', 1)
					->whereNotIn('id', $ads_swaped)
					->get()
					->pluck('id');
				foreach($ids as $id){
					$adIds[] = $id;
				}
			}
			if($request->ad_search != ''){
				$ads = Ad::with('transactions')
					->whereIn('id', $adIds)
					->where('ads.status', 1)
					->whereHas('transactions', function($query){
						// Now querying on transactions
						//$query->where('endDate', '>', Carbon::now());
					})
					->paginate(20);

			}else{
				$ads = Ad::with('transactions')
					->where('ads.status', 1)
					->whereHas('transactions', function($query){
						// Now querying on transactions
						$query->where('endDate', '>', Carbon::now());
					})
					->whereNotIn('id', $ads_swaped)
					->paginate(20);
			}
		//}else{
			
			
			
		//}
		
		//dd(DB::getQueryLog());
		
		//dd($skills);
		
		return view('common.search_ads',[
			'ads'	=> $ads
		]);
	}
	
	/**
	 * ad create form
	 */
	public function create()
	{
		$packages = Packages::get();
		return view('ad.create',[
			'packages'	=> $packages
		]);
	}

	public function save_images(Request $request){

		//prepare image data for ad
		$dataImage = array(
			'status'	=> false,
			'image'		=> ''
		);
		
		$destinationPath = 'uploads/';
		if ($request->hasFile('adimage')) {
			$file = $request->file('adimage');
			//foreach($files as $file){
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$picture = date('His-').$filename;
				$file->move($destinationPath, $picture);
				
				$dataImage = array(
					'status'	=> true,
					'image' => $picture
				); 
			//}
		}

		return json_encode($dataImage);

	}
	
	/**
	 * save ad's details 
	 */
	public function save(Request $request)
	{
		
		//prepare image data for ad
		$dataImage = [];
		$destinationPath = 'uploads/';
		if ($request->hasFile('adimage')) {
			$files = $request->file('adimage');
			foreach($files as $file){
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$picture = date('His-').$filename;
				$file->move($destinationPath, $picture);
				
				$dataImage[] = array('image' => $picture); 
			}
		}else{
			//Set default image for ad
			$dataImage[] = array('image' => 'no-image-featured-image.png');
		}
		
		$slug = $request->input('headline') or str_limit($request->input('headline'));
		
		//prepare and store ad data
		$data = [
			'user_id' 			=> Auth::user()->id,
			'adHeadline' 		=> $request->input('headline'),
			'slug'				=> str_slug($slug, '-'),
			// 'shortDescription'	=> $request->input('short_description'),
			'adDescription'		=> $request->input('description'),
			'inExchange'		=> $request->input('exchange'),
			'createdAt'			=> date('Y-m-d H:i:s'),
			'updatedAt'			=> date('Y-m-d H:i:s'),
			'extraImages'		=> $request->input('extra_images'),
				
			//Contact Information
			'contactEmail'		=> $request->input('contact.email') != '' ? $request->input('contact.email') : Auth::user()->email,
			'contactAddress'	=> $request->input('contact.address') != '' ? $request->input('contact.address') : Auth::user()->address,
			'contactZipCode'	=> $request->input('zipcode') != '' ? $request->input('zipcode') : Auth::user()->postCode,
			'contactTown'		=> $request->input('contact.town'),
			'contactPhone1'		=> $request->input('phone1') != '' ? $request->input('phone1') : Auth::user()->phone1,
			'contactPhone2'		=> $request->input('phone2') != '' ? $request->input('phone2') : Auth::user()->phone2,
			'status'			=> 1
		];
		
		
		$data = $this->get_package_rights($request->package, $data);		//get paid features based on package name
		$adId = Ad::insertGetId($data);
		
		//store ad image data
		foreach ($dataImage as $k => $image){
			$dataImage[$k]['ad_id'] = $adId;
		}
		AdImage::insert($dataImage);
		
		// //store ad image data
		// if($request->input('gallery_images') != ''){
			// $images = explode(',', $request->input('gallery_images'));
			// foreach ($images as $k => $image){
				// $dataImage[] = array(
					// 'ad_id' => $adId,
					// 'image' => $image
				// );
			// }
		// }else{
			// $dataImage[0] = array(
				// 'ad_id'	=> $adId,
				// 'image'	=> 'no-image-featured-image.png'
			// );
		// }
		// AdImage::insert($dataImage);

		//prepare and store skills for the ad
		$skills = explode(':', $request->input('skills'));
		$dataSkill = [
			'ad_id'			=> $adId,
			'skill_id'		=> $skills[1],
			'category_id'	=> $skills[0]
		];
		AdSkill::insert($dataSkill);

		Category::where('id', $skills[0])->increment('adsCount');
		
		$order_id = $request->input('order_id');
		$total_amount = $request->input('total_amount');

		// $order_id = Auth::user()->id.'-'.uniqid();
		$total_amount = $this->get_package_price($request->package) + $request->input('extra_images_price');
		// $paymentController = new PaymentController();
		// $payment_link = $paymentController->payment_link($total_amount, $order_id);

		//get payement details
		$paymentController = new PaymentController();
		$payment = $paymentController->pay($request->input('payment_id'));
		
		//set default txn data
		$data = array(
			'order_id'	=> $order_id,
			'ad_id'		=> $adId,
			'user_id'	=> $request->input('user'),
			'txnType'	=> $request->package != '' ? $request->package : 'Unknown',
			'amount'	=> $total_amount,
			'startDate'	=> Carbon::now(),
			'endDate'	=> $this->set_expiry_for_ad()
		);
		if($payment != false){
			//set txn data if accepted
			$data = array_merge($data, array(
				'payment_id'	=> $request->input('payment_id'),
				'accepted'	=> $payment->accepted,
				'pending'	=> $payment->operations[0]->pending,
				'aq_status_msg'	=> $payment->operations[0]->aq_status_msg,
				'status'		=> 'payment received',
				'created_at'	=> $payment->operations[0]->created_at,
				
			));
		}
		//Make transaction for every ad created
		$transactionId = Transaction::insertGetId($data);
		
		$data['ad_id'] = $adId;
		 
		//Send Email notification to admin
		Mail::send('admin.emails.new_ad', $data, function ($message) use ($data) {
			$message->from(config('constants.NO_REPLY_EMAIL'));
			 
			$message->to(config('constants.ADMIN_EMAIL'))->subject('Swappi ny annonce Ankom');
		});
		
		//redirect
		if($total_amount !== 0){
			//return redirect()->route('payment', ['fields' => $request->all(), 'order_id' => $order_id]);
			//return redirect()->route('route.name', ['parameter' => 'value']);
		}
		
		return redirect('ads');
	}


	/***
	** Create Iframe inside popup data so that page do not naviage 
	**
	**/

	public function iframe($orderID, $amount, $checksum){
		return view('ad.iframe',[
			'order_id'		=> $orderID,
			'amount'	=> $amount,
			'checksum'		=> $checksum
		]);
	}

	/**
	 *	create payment link and return
	 */
	public function get_payment_link(Request $request){
		$return = array(
			'status'	=> false,
			'data'		=> 'Some thing went wrong!'
		);
		
		
		$order_id = Auth::user()->id.'-'.Carbon::now()->timestamp;
		
		$total_amount = $this->get_package_price($request->package) + $request->input('extra_images_price');
		//cheking if the type is renew
		if(isset($request->ad_id) && $request->ad_id != ''){
			$callback = url('/process_order'). '/'.$request->ad_id.'/'.$order_id;
		}else{
			$callback = null;
		}
		
		/*$paymentController = new PaymentController();
		$payment_link = $paymentController->payment_link($total_amount, $order_id, $callback);
		$payment_link = json_decode($payment_link);
		
		
		
		$return = array(
			'status'	=> true,
			'data'		=> array(
				'order_id'		=> $payment_link->order_id,
				'payment_id'	=> $payment_link->payment_id,
				'total_amount'	=> $total_amount,
				'payment_link'	=> $payment_link->payment_link,
				'category'		=> @$category	
			)
		); */

		$paymentController = new PaymentController();
		$params = array(
			"version"      => "v10",
			"merchant_id"  => 16544,
			"agreement_id" => 145565,
			"order_id"     => $order_id,
			"amount"       => $total_amount,
			"currency"     => "DKK",
			"payment_methods"=> "paypal,mobilepay",
			"continueurl" => url('/').'/success',
			"cancelurl"   => url('/').'/cancel',
			"callbackurl" => url('/').'/callback'
		);

		$params["checksum"] = $paymentController->sign($params);
		$return = array(
			'status'	=> true,
			'data'		=> $params
		);


		return json_encode($return);
	}
	
	public function success(){

	}
	public function cancel(){
		
	}
	public function callback(){
		
	}
	public function get_category_skill($skill){
		//getting category from skill
		$pos = strpos($skill, ':' );
		$cat_id = substr($skill, 0, $pos);
		
		$category = Category::where('id', $cat_id)->get()->first();
		// dd($category);
		return json_encode([
			'status' => true,
			'data'	=>	$category['categoryName'],	
		]);
	}

	/**
	 *	authorize payment for the card
	 */
	public function call_authorize(Request $request){
		$paymentController = new PaymentController();
		$paymentController->payment_authorize(
			$request->input('payment_id'),
			$request->input('amount'),
			$request->input('ct')
		);
	}
	
	/**
	 * mark ad as favorite
	 */
	public function addToFavorite(Request $request = null, $data = null)
	{
		if($data == null){
			$data = [
				'user_id'	=> $request->input('user'),
				'ad_id'		=> $request->input('ad'),
			];
		} else {
			$data = [
				'user_id'	=> $data['user'],
				'ad_id'		=> $data['ad'],
			];
		}
		
		//Check if ad is already favorited by user 
		if (AdFavorite::where($data)->count() > 0){
			return json_encode([
				'status' => false,
				'msg'	=> 'Ad Already favorited.'
			]);
		}
		
		if(AdFavorite::insert($data)){
			return json_encode([
				'status' => true,
				'msg'	=> 'Done'
			]);
		}
		
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}
	
	/*
	 * Ad edit page
	 */
	public function edit($ad)
	{
		$ad = Ad::where('id', '=', $ad)->get();
		$featured = '';
		foreach ($ad[0]->adImages as $image){
			if($image->isFeatured){
				$featured = $image->image;
			}
		}
		$user = User::where('id', $ad[0]->user->id)->get();
	
		$ads = Ad::limit(3)->where('id', '!=', $ad[0]->id)->inRandomOrder()->get();
		$featured = $featured == '' ? $ad[0]->adImages[0]->image : $featured;
	
		$rightCategories = Category::limit(3)->inRandomOrder()->get();

		$connections = Connection::where([
					['user_id', $ad[0]->user->id],
					['status', '!=', 0]
				])->orWhere([
					['follower_id', $ad[0]->user->id],
					['status', '!=', 0]
				])->get();

		return view('ad.edit',[
			'ad'		=> $ad[0],
			'featured'	=> $featured,
			'user'		=> $user[0],
			'connections'	=> $connections,
			'ads'		=> $ads,
			'rightCategories' => $rightCategories
		]);
	}
	
	/**
	 * Update ad details
	 * @param Request $request
	 */
	public function update(Request $request)
	{
		if($request->input('ad_id')){
			//prepare image data for ad
			$adImages = $request->input('adImages');
			$adImages = AdImage::select('id')->whereNotIn('id', $adImages)->where('ad_id', $request->input('ad_id'))->get();
			AdImage::whereIn('id', $adImages)->delete();
			 
			$dataImage = [];
			$destinationPath = 'uploads/';
			if ($request->hasFile('add_images')) {
				$files = $request->file('add_images');
				foreach($files as $file){
					$filename = $file->getClientOriginalName();
					$extension = $file->getClientOriginalExtension();
					$picture = date('His-').$filename;
					$file->move($destinationPath, $picture);
					 
					$dataImage[] = array('image' => $picture);
				}
			}
			
			$created = explode(' /', $request->input('adCreated'));
			$created[1] = explode('-', $created[1]);
			$createdAt = $created[1][1].'-'.$created[1][0].'-'.$created[0];
			
			$data = [
				'adHeadline'	=> $request->input('adHeadline'),
				'inExchange'	=> $request->input('adExchange'),
				'createdAt'		=> $createdAt,
				'adDescription'	=> $request->input('adDescription'),
			];
			
			$flag = Ad::where('id', $request->input('ad_id'))->update($data);
			
			//store ad image data
			foreach ($dataImage as $k => $image){
				$dataImage[$k]['ad_id'] = $request->input('ad_id');
			}
			AdImage::insert($dataImage);
			
			if($flag){
				Session::flash('success', 'Data updated successfully.');
				return redirect('ad/' . $request->input('ad_id') . '/edit');
			}else{
				Session::flash('success', 'Some error occured.');
				return redirect('ad/' . $request->input('ad_id') . '/edit');
			}
		}
		
		Session::flash('success', 'No data to update.');
		return redirect('ad/' . $request->input('ad_id') . '/edit');
	}
	
	
	/**
	 * Mark an ad image as featured
	 * @param unknown $imgId
	 */
	public function mark_image(Request $request)
	{
		if($request->input('flag') == 'featured'){
			$data = [
				'isFeatured' => 0
			];
		}else{
			$data = [
				'isFeatured' => 1
			];
		}
		AdImage::where('id', $request->input('imgid'))->update($data);
		 
		echo json_encode([
			'status'	=> true,
			'msg'		=> 'Data updated successfully.'
		]);
	}

	/**
	 * Make a swap request from owner to swaper for the ad.
	 */
	public function make_swap(Request $request)
	{
		$request_to_frwd = $request;
		$data = [
			'ad_id' => $request->input('ad_id'),
			'ad_owner_id' => $request->input('reciever'),
			'ad_swaper_id'	=> $request->input('sender')
		];
		AdSwap::insert($data);

		$user = User::where('id', $data['ad_swaper_id'])->get();
		$ad = Ad::where('id', $data['ad_id'])->get();

		$request->request->add([
			'msgText' =>  $user[0]->fName . ' ' . $user[0]->lName .' vil Swappe med dig på annoncen ' . $ad[0]->adHeadline . '?
				<a href="'. url('ad/accept_swap/' . $data['ad_id'] . '/' . $data['ad_owner_id']. '/' . $data['ad_swaper_id']) .'" class="btn-link accept-pending" title="Accept">Godkend</a> // <a  href="'. url('ad/deny_swap/' . $data['ad_id'] . '/' . $data['ad_owner_id']. '/' . $data['ad_swaper_id']) .'" class="btn-link accept-pending" title="Deny">Afvis</a>'
		]);
		//Send notification in message to ad owner
		$messageController = new MessageController(new MessageRepository());
		$messageController->save($request_to_frwd);

		//Send connection request to ad owner
		$profileController = new ProfileController();
		$profileController->send_request($request_to_frwd, $data['ad_owner_id']);
		 
		echo json_encode([
			'status'	=> true,
			'msg'		=> 'Data updated successfully.'
		]);
	}

	public function accept_swap(Request $request, $ad_id, $owner_id, $swaper_id){
		$this->swap_update($ad_id, $owner_id, $swaper_id, 1);

		Ad::where([
				['id', $ad_id],
				['user_id', $owner_id]
			])->update(['status' => 0]);

		//connection accept
		$profileController = new ProfileController();
		$profileController->accept_request($request, $swaper_id);

		//adding to favourites
		$this->addToFavorite(null, ['user' =>$owner_id , 'ad' => $ad_id]);
		$this->addToFavorite(null, ['user' => $swaper_id, 'ad' => $ad_id]);
		
		//redirect
		return redirect('profile');
	}

	public function deny_swap(Request $request, $ad_id, $owner_id, $swaper_id){
		$this->swap_update($ad_id, $owner_id, $swaper_id, 0);

		//connection deny
		$profileController = new ProfileController();
		$profileController->deny_request($request, $swaper_id);

		//redirect
		return redirect('profile');
	}

	/**
	*	Update swap request for users belongs to an "ad"
	*/
	protected function swap_update($ad_id, $owner_id, $swaper_id, $status){
		//Check if swap request is present
		$swap = AdSwap::where([
					['ad_id', $ad_id],
					['ad_owner_id', $owner_id],
					['ad_swaper_id', $swaper_id],
					['status', '!=', 0]
				])
				->count();
		if($swap > 0){
			//Accept swap request as the connection accepted
			AdSwap::where([
					['ad_id', $ad_id],
					['ad_owner_id', $owner_id],
					['ad_swaper_id', $swaper_id],
					['status', '!=', 0]
				])
				->update([
					'status'	=> $status
				]);
		}

	}

	public function post_review(Request $request){

		$review_data = [];

		//if Owner found
		// if($request->input('from_user_id')){
		// 	$from_user_id = $request->input('from_user_id');
		// 	$ad_swap = AdSwap::where([
		// 			['ad_owner_id', $request->input('from_user_id')],
		// 			['ad_id', $request->input('ad_id')],
		// 			['status', 1]
		// 		])->get();
		// 	$user_id = $ad_swap[0]->ad_swaper_id;

		// 	$review_data['owner_reviewed'] = 1;
		// }

		//id Swaper found
		// if($request->input('user_id')){
		// 	$user_id = $request->input('user_id');
		// 	$ad_swap = AdSwap::where([
		// 			['ad_swaper_id', $request->input('user_id')],
		// 			['ad_id', $request->input('ad_id')],
		// 			['status', 1]
		// 		])->get();
		// 	$from_user_id = $ad_swap[0]->ad_owner_id;

		// 	$review_data['swaper_reviewed'] = 1;
		// }

		if($request->input('swaper_reviewed')){
			$review_data['swaper_reviewed'] = $request->input('swaper_reviewed');
			
			$from_user_id = $request->input('user_id');
			$user_id = $request->input('from_user_id');

			AdSwap::where([
				['ad_id', $request->input('ad_id')],
				['ad_owner_id', $request->input('user_id')],
				['ad_swaper_id', $request->input('from_user_id')],
				['status', 1]
			])
		    ->update($review_data);
		}
		if($request->input('owner_reviewed')){
			$review_data['owner_reviewed'] = $request->input('owner_reviewed');

			$from_user_id = $request->input('from_user_id');
			$user_id = $request->input('user_id');

			AdSwap::where([
				['ad_id', $request->input('ad_id')],
				['ad_owner_id', $request->input('from_user_id')],
				['ad_swaper_id', $request->input('user_id')],
				['status', 1]
			])
		    ->update($review_data);
		}

		$review = [
			'user_id'		=> $user_id,
			'from_user_id'	=> $from_user_id,
			'ratting'		=> $request->input('ratting'),
			'reviewTitle'	=> $request->input('reviewTitle'),
			'comment'		=> $request->input('comment'),
			'solutionDate'	=> $request->input('solutionDate'),
			'updatedAt'		=> Carbon::now(),
		];
		Review::insert($review);

		AdSwap::where(
				['ad_id'=> $request->input('ad_id')]
			)
		    ->update(['status' => 3]);

		Ad::where(['id'=> $request->input('ad_id')]) 
				->update(['status' => 0]);   

		return redirect('ad/'.$request->input('ad_id').'/detail');
	}

	public function skip_review(Request $request){
		$who_skipped = $request->input('who_skipped');
		$ad_swap = [
			$who_skipped => 1
		];
		
		AdSwap::where([
				['ad_id', $request->input('ad_id')],
				[$request->input('flag'), $request->input('user_skipped')],
				['status', 1]
			])
			->update($ad_swap);
	}
	
	public function payment_filter(Request $request){
		
		$price = $this->get_package_price($request->input('fields.package'));
		$price = $price + $request->input('fields.extra_images_price');
		
		// Create payment
		$params = array(
			"version"      => "v10",
			"merchant_id"  => 16544,
			"agreement_id" => 59367,
			"order_id"     => $request->input('order_id'),
			"amount"       => $price,
			"currency"     => "DKK",
			"continueurl" => url("ad/continue"),
			"cancelurl"   => url("ad/cancel"),
			"callbackurl" => url("ad/callback"),
			"variables"		=> [
				'package'	=> $request->input('fields.package'),
				'_token'	=> $request->input('_token'),
			]
		);
				
		$params["checksum"] = $this->sign($params);
			
		return view('ad.payredirect', array('params' => $params));
		
	}
	
	protected function set_expiry_for_ad(){
		$current = Carbon::now();
		return $current->addDays(30);
	}
	
	/**
	 * Set paid features based on package
	 * @param unknown $package
	 * @param unknown $ad_data
	 * @return $ad_data
	 */
	protected function get_package_rights($package, $ad_data){
		
		switch ($package){
			case "premium":
				$ad_data['masthead'] = 1;
				$ad_data['carouselGallery'] = 1;
				$ad_data['topAdCategory'] = 1;
				$ad_data['isFeatured'] = 1;
				break;
					
			case "gold":
				$ad_data['topAdCategory'] = 1;
				$ad_data['isFeatured'] = 1;
				break;
					
			case "standard":
				$ad_data['isFeatured'] = 1;
				break;
					
			default:
				
				break;
					
		}
		
		return $ad_data;
	}
	
	/**
	 * get package price
	 * @param unknown $package
	 * @return string
	 */
	protected function get_package_price($package){
		
		$package = Packages::where('package_identifier', $package)->get()->first();
		$package = $package['package_price'];
		// switch ($package){
			// case "premium":
				// // $package = 15050;
			// break;
			
			// case "gold":
				// $package = 10000;
			// break;
			
			// case "standard":
				// $package = 01000;
			// break;
			
			// default:
				// $package = 0;
			// break;
			
		// }
		
		return $package;
	}
	
	protected function sign($params) {
		$flattened_params = $this->flatten_params($params);
		ksort($flattened_params);
		$base = implode(" ", $flattened_params);
	
		return hash_hmac("sha256", $base, config('constants.QUICKPAY_API_KEY'));
	}
	
	protected function flatten_params($obj, $result = array(), $path = array()) {
		if (is_array($obj)) {
			foreach ($obj as $k => $v) {
				$result = array_merge($result, $this->flatten_params($v, $result, array_merge($path, array($k))));
			}
		} else {
			$result[implode("", array_map(function($p) { return "[{$p}]"; }, $path))] = $obj;
		}
	
		return $result;
	}
	
	public function payment_continue(){
		return redirect('ads');
	}

	public function payment_cancel(){
		return 'Payment canceled by user'; 
	}
	
	public function payment_callback(Request $request){
		
		// Get the content from request
		$request_array = $request->getContent();
		$request_array = json_decode($request_array, true);
		$request_body = file_get_contents("php://input");
		
		//$request_body = str_replace(' ', '',$request_body);
		var_dump($request_body);
		
		$destinationPath = 'uploads/';
		$filename = $destinationPath . 'callback-' . date('ymdHis') . '.log';
		file_put_contents($filename, json_encode($request_array). "\r\n--------------------\r\n" .json_encode($_SERVER));
		
		$checksum = $this->callback_sign($request_body);
		var_dump($checksum.' - '.$_SERVER["HTTP_QUICKPAY_CHECKSUM_SHA256"]);
		
		if(isset($_SERVER["HTTP_QUICKPAY_CHECKSUM_SHA256"])){
			
			if($checksum == $_SERVER["HTTP_QUICKPAY_CHECKSUM_SHA256"]){
				// Request is authenticated
				
				file_put_contents($filename, file_get_contents($filename) . 'Request is authenticated.');
				
				$data = array(
					'txnType' => $request_array['variables']['package'],
					'accepted'	=> $request_array['accepted'],
					'amount'	=> $request_array['operations'][0]['amount'],
					'pending'	=> $request_array['operations'][0]['pending'],
					'aq_status_msg'	=> $request_array['operations'][0]['aq_status_msg'],
					'customer_ip'	=> $request_array['metadata']['customer_ip'],
					'created_at'	=> $request_array['created_at'],
					'status'		=> 'payment received'
				);
				Transaction::where('order_id', $request_array['order_id'])->update($data);
				
				//dd($_POST);
			}else{
				// Request is NOT authenticated
				file_put_contents($filename, file_get_contents($filename) . 'Request is NOT authenticated.');
				//dd($_POST);
			}
		}else{
			// Request is NOT authenticated
			file_put_contents($filename, file_get_contents($filename) . 'Request is NOT authenticated. HTTP_QUICKPAY_CHECKSUM_SHA256 not found');
		}
		
	}
	
	protected function callback_sign($base) {
		return hash_hmac("sha256", $base, config('constants.QUICKPAY_PRIVATE_KEY'));
	}
	
	/**
	*	Confirms the renewal of payment for the ad
	*
	*	@param string order_id
	*	@return void
	*/
	function get_order_details($ad_id, $order_id){
	
		$payment_controller = new PaymentController();
		
		$ad_details = Transaction::where([
			['ad_id', $ad_id],
		])->get();
		
		if(count($ad_details) == 0){
			session()->flash('status', ['message' => 'No such ad is present', 'status' => false]);
			return redirect()->route('ads');
		}
		
		//getting order_details
		$details = $payment_controller->get_order_details($order_id);	
		
		if (isset($details[0]) && $details[0]->accepted == true) {
			$renews = count($ad_details);
			
			$current = $ad_details[$renews-1]->endDate;
			$enddate = date('Y-m-d H:i:S', strtotime($current. ' + 30 days'));
			
			// $enddate = $current->addDays(30);
			
			//set default txn data
			$data = array(
				'order_id'			=> $order_id,
				'ad_id'				=> $ad_details[0]->ad_id,
				'user_id'			=> $ad_details[0]->user_id,
				'txnType'			=> $ad_details[0]->txnType,
				'amount'			=> $details[0]->operations[0]->amount,
				'startDate'			=> $current,
				'endDate'			=> $enddate,
				'payment_id'		=> $details[0]->id,
				'accepted'			=> $details[0]->accepted,
				'pending'			=> $details[0]->operations[0]->pending,
				'aq_status_msg'		=> $details[0]->operations[0]->aq_status_msg,
				'status'			=> 'payment received',
				'created_at'		=> $details[0]->operations[0]->created_at,
				'transaction_type'	=> 'renew'
			);
			//Make transaction for every ad created
			$transactionId = Transaction::insertGetId($data);
			
			// $data['ad_id'] = $adId;
			 
			// Send Email notification to admin
			Mail::send('admin.emails.new_ad', $data, function ($message) use ($data) {
				$message->from(config('constants.NO_REPLY_EMAIL'));
				 
				$message->to(config('constants.ADMIN_EMAIL'))->subject('Swappi ny annonce Ankom');
			});
			$return = 'Ad renewed successfully!';
		} else {
			$return =   'Something went wrong';
		}
		
		//\Session::flash('status', $return);	
		session()->flash('status', $return);
		return redirect()->route('ads');		
	}
	
}
