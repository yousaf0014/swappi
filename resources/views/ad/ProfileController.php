<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use App\Ad;
use App\User;
use App\Category;
use App\SkillUser;
use App\FavoriteUser;
use App\Experience;
use App\Training;
use App\Project;
use App\Certification;
use App\Connection;
use App\Review;
use App\AdSwap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{	Carbon::setLocale('da');
		$this->middleware('auth');
	}
	
    /*
     * Profile detail page
     */
	public function index()
	{
		$id = Auth::user()->id;
		DB::enableQueryLog();
		
		$user = User::where('status', 1)->with('skills')->where('id', $id)->get();

		// $ads = Ad::limit(2)->where('isFeatured', 1)->get();
		//randomizing the ads
		$ads = DB::table('transactions')
                ->where('transactions.txnType', '=', 'gold')
                ->select('transactions.ad_id')
                ->limit(2)
                ->inRandomOrder()
                ->distinct()
                ->get();
                // dd($ads);
        if(count($ads)){
        	$ad_id = [$ads[0]->ad_id, $ads[1]->ad_id];
        }
		$ads = Ad::whereIn('id',$ad_id)->limit(2)->get();

		$rightCategories = Category::where('status', 1)->limit(3)->inRandomOrder()->get();
		$categories = Category::where('status', 1)->get();
		
		$skills = array_pluck($user, 'skills');
		$skills = array_pluck($skills[0], 'id');
		$skillUsers = SkillUser::select('user_id')->whereIn('skill_id', $skills)->get();
		$skillUsers = array_pluck($skillUsers, 'user_id');
		$sugestUsers = User::whereIn('id', $skillUsers)->inRandomOrder()->where('id', '!=', $id)->get();
		
		$connections = Connection::where([
					['user_id', $id],
					['status', '!=', 0]
				])->orWhere([
					['follower_id', $id],
					['status', '!=', 0]
				])->get();
		//dd(DB::getQueryLog());
		
		return view('profile.myprofile', [
			'user'				=> $user,
			'ads'				=> $ads,
			'rightCategories'	=> $rightCategories,
			'sugestUsers'		=> $sugestUsers,
			'connections'		=> $connections,
			'categories'		=> $categories
		]);
	}
	
	/**
	 * Save user profile data
	 * @param Request $request
	 * @return unknown
	 */
	public function update(Request $request){
		
		$data = [
			'fName'			=> $request->input('fName'),
			'lName'			=> $request->input('lName'),
			'city'			=> $request->input('city'),
			'phone1'			=> $request->input('phone1'),
			'address'			=> $request->input('address'),
			'skype'			=> $request->input('skype'),
			'twitter'			=> $request->input('twitter'),
			'facebook'			=> $request->input('facebook'),
			'description'	=> $request->input('description'),
			'businessLink'	=> $request->input('businessLink')
		];
		
		$destinationPath = 'uploads/';
		if ($request->hasFile('profilePic')) {
			$file = $request->file('profilePic');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
			
			// open file a image resource
			$img = Image::make($destinationPath . $picture);
			
			// crop image
			$img->crop(
				ceil($request->input('w')), 
				ceil($request->input('h')), 
				ceil($request->input('x')), 
				ceil($request->input('y'))
			);
			$img->save();
		
			$data['profilePic'] = $picture;
		}

		if ($request->hasFile('coverPic')) {
			$file = $request->file('coverPic');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
			
			$data['coverPic'] = $picture;
		}
		
		if($request->input('id')){
			//dd($data);
			User::where('id', $request->input('id'))->update($data);
			
			Experience::where('user_id', $request->input('id'))->orderby('user_id')->limit(1)->update([
				'designation'	=> $request->input('user.designation'),
				'orgName'		=> $request->input('user.orgName'),
			]);
			
			Training::where('user_id', $request->input('id'))->orderby('user_id')->limit(1)->update([
				'Name'	=> $request->input('user.trainingName'),
			]);
		
			$request->session()->flash('success', 'Data updated successfully.');
			return redirect('profile');
		}
	}
	
	/*
	 * Other profile detail page
	 */
	public function otherUser($user = false)
	{
		$id = $user;
		
		$user = User::with('skills')->where('id', $id)->get();

		//randomizing the ads
		$ads = DB::table('transactions')
                ->where('transactions.txnType', '=', 'gold')
                ->select('transactions.ad_id')
                ->limit(2)
                ->inRandomOrder()
                ->distinct()
                ->get();
                // dd($ads);
        if(count($ads)){
        	$ad_id = [$ads[0]->ad_id, $ads[1]->ad_id];
        }
		$ads = Ad::whereIn('id',$ad_id)->limit(2)->get();
		
		$rightCategories = Category::where('status', 1)->limit(3)->inRandomOrder()->get();
	
		$skills = array_pluck($user, 'skills');
		$skills = array_pluck($skills[0], 'id');
		$skillUsers = SkillUser::select('user_id')->whereIn('skill_id', $skills)->get();
		$skillUsers = array_pluck($skillUsers, 'user_id');
		$sugestUsers = User::whereIn('id', $skillUsers)->inRandomOrder()
			->where([
				['id', '!=', Auth::user()->id],
				['id', '!=', $id]
			])->get();
		
		$connections = Connection::where([
					['user_id', $id],
					['status', '!=', 0]
				])->orWhere([
					['follower_id', $id],
					['status', '!=', 0]
				])->get();
	
		return view('profile.index', [
			'user'				=> $user,
			'ads'				=> $ads,
			'rightCategories'	=> $rightCategories,
			'sugestUsers'		=> $sugestUsers,
			'connections'		=> $connections
		]);
	}
	
	/*
	 * Profiles search page
	 */
	public function search(Request $request)
	{
		$categories = Category::where('status', 1)->get();
		$cities = User::select('city')->distinct()->get();
		
		$userids = [];
		if(isset($request->find)){
			if(isset($request->firstName)){
				if($request->firstName <> ''){
					$ids = User::select('id')
						->where('status', 1)
						->where('fName', 'like', $request->firstName.'%')
						->where('id', '!=', Auth::user()->id)
						->whereNull('role')
						->get()
						->pluck('id');
					foreach ($ids as $id){
						$userids[] = $id;
					}
				}
			}
			if(isset($request->cities)){
				$ids = User::select('id')
					->whereIn('city', $request->cities)
					->where('id', '!=', Auth::user()->id)
					->where('status', 1)
					->whereNull('role')
					->get()
					->pluck('id');
				foreach ($ids as $id){
					$userids[] = $id;
				}
			}
			if(isset($request->categories)){
				$ids = User::select('users.id')->join('skill_user', 'skill_user.user_id', '=', 'users.id')
					->where('users.id', '!=', Auth::user()->id)
					->where('status', 1)
					->whereNull('role')
					->whereIn('category_id', $request->categories)
					->groupby('users.id')
					->get()
					->pluck('id');
				foreach ($ids as $id){
					$userids[] = $id;
				}
			}
			$users = User::where('id', '!=', Auth::user()->id)
				->whereIn('id', $userids)
				->where('status', 1)
				->whereNull('role')
				->get();
		}else{
			$users = User::where('id', '!=', Auth::user()->id)
				->where('status', 1)
				->whereNull('role')
				->get();
		}
		
		$friendIds = [];
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}
		
		return view('profile.search', [
			'fields'	=> $request->all(),
			'categories' => $categories,
			'cities'	=> $cities,
			'users'		=> $users,
			// 'friendIds'	=> $friendIds
		]);
	}

	public function get_search_users(Request $request){
		$userids = [];
		DB::enableQueryLog();
		if(isset($request->find)){
			if(isset($request->firstName)){
				if($request->firstName <> ''){
					$ids = User::select('id')
						->where('status', 1)
						->where('fName', 'like', $request->firstName.'%')
						->where('id', '!=', Auth::user()->id)
						->whereNull('role')
						->get()
						->pluck('id');
					foreach ($ids as $id){
						$userids[] = $id;
					}
				}
			}
			if(isset($request->cities)){
				$ids = User::select('id')
					->whereIn('city', $request->cities)
					->where('id', '!=', Auth::user()->id)
					->where('status', 1)
					->whereNull('role')
					->get()
					->pluck('id');
				foreach ($ids as $id){
					$userids[] = $id;
				}
			}
			if(isset($request->categories)){
				$ids = User::select('users.id')->join('skill_user', 'skill_user.user_id', '=', 'users.id')
					->where('users.id', '!=', Auth::user()->id)
					->where('status', 1)
					->whereNull('role')
					->whereIn('category_id', $request->categories)
					->groupby('user_id')
					->get()
					->pluck('id');
				foreach ($ids as $id){
					$userids[] = $id;
				}
			}
			$users = User::where('id', '!=', Auth::user()->id)
				->whereIn('id', $userids)
				->where('status', 1)
				->whereNull('role')
				->paginate(20);
		}else{
			$users = User::where('id', '!=', Auth::user()->id)
				->whereNull('role')
				->where('status', 1)
				->paginate(20);
		}
		
		$friendIds = [];
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}

		return view('common.profile_users', [
			'users'		=> $users,
			'friendIds'	=> $friendIds
		]);
	}
	
	/*
	 * Newer profiles page
	 */
	public function newer(Request $request)
	{
		$categories = Category::get();
		$cities = User::select('city')->distinct()->get();
	
		$users = User::orderby('createdAt', 'DESC')
			->where('id', '!=', Auth::user()->id)
			->whereNull('role')
			->where('status', 1)
			->get();
		
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}
	
		return view('profile.newer', [
			'fields'	=> $request->all(),
			'categories' => $categories,
			'cities'	=> $cities,
			'users'		=> $users,
			// 'friendIds'	=> $friendIds
		]);
	}

	public function get_newer_users(){
		$users = User::orderby('createdAt', 'DESC')
			->where('id', '!=', Auth::user()->id)
			->where('status', 1)
			->whereNull('role')
			->paginate(20);
		
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}

		return view('common.profile_users', [
			'users'		=> $users,
			'friendIds'	=> $friendIds
		]);
	}
	
	/*
	 * Popular profiles page
	 */
	public function popular(Request $request)
	{
		$categories = Category::get();
		$cities = User::select('city')->distinct()->get();
	
		$users = User::with('reviews')
			->addSelect('users.id as userid')->addSelect('users.*')
			->addSelect(DB::raw('count(reviews.id) as rattingCount'))->addSelect(DB::raw('SUM(reviews.ratting) as rattingSum'))
			->leftJoin('reviews', 'reviews.user_id', '=', 'users.id')
			->where('users.id', '!=', Auth::user()->id)
			->where('users.status', 1)
			->whereNull('users.role')
			->orderby('reviews.ratting', 'DESC')
			->groupby('users.id')
			->get();
		
		
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}
	
		return view('profile.popular', [
			'fields'	=> $request->all(),
			'categories' => $categories,
			'cities'	=> $cities,
			'users'		=> $users,
			// 'friendIds'	=> $friendIds
		]);
	}

	public function get_popular_users(){
		$users = User::with('reviews')
			->addSelect('users.id as userid')->addSelect('users.*')
			->addSelect(DB::raw('count(reviews.id) as rattingCount'))->addSelect(DB::raw('SUM(reviews.ratting) as rattingSum'))
			->leftJoin('reviews', 'reviews.user_id', '=', 'users.id')
			->where('users.id', '!=', Auth::user()->id)
			->where('users.status', 1)
			->whereNull('users.role')
			->orderby('reviews.ratting', 'DESC')
			->groupby('users.id')
			->paginate(20);
		
		foreach(Auth::user()->friends as $friend){
			$friendIds[] = $friend->id;
		}

		return view('common.profile_users', [
			'users'		=> $users,
			'friendIds'	=> $friendIds
		]);
	}
	
	/**
	 * mark user as favorite [No need Removed 2017-04-06]
	 */
	/*public function addToFavorite(Request $request)
	{
		return json_encode([
				'status' => true,
				'msg'	=> 'Done'
		]);
		
		$data = [
			'user_id'		=> $request->input('user_id'),
			'favorite_id'	=> $request->input('favorite_id'),
		];
	
		//Check if ad is already favorited by user
		if (FavoriteUser::where($data)->count() > 0){
			return json_encode([
				'status' => false,
				'msg'	=> 'User Already favorited.'
			]);
		}
	
		if(FavoriteUser::insert($data)){
			return json_encode([
				'status' => true,
				'msg'	=> 'Done'
			]);
		}
	
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}*/
	
	/**
	 * Save user's project data
	 * @param Request $request
	 * @return unknown
	 */
	public function projectSave(Request $request) {
		$data = [
			'title' => $request->input('title'),
			'category_id' => $request->input('category_id'),
			'description' => $request->input('description'),
			'startDate' => changeToTimestamp1($request->input('startDate')),
			'endDate' => changeToTimestamp1($request->input('endDate')),
		];
		
		$destinationPath = 'uploads/';
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
			
			$data['logo'] = $picture;
		}
		
		if($request->input('id')){ 
			if(Project::where('id', $request->input('id'))->update($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}else{
			$data['user_id'] = $request->input('user_id'); 
			if(Project::insert($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}
		
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}
	
	/**
	 * Save user's certificate data
	 * @param Request $request
	 * @return unknown
	 */
	public function certificateSave(Request $request) {
		$data = [
			'certName' => $request->input('name'),
			'certOrg' => $request->input('org'),
			'certDate' => changeToTimestamp1($request->input('date')),
		];
	
		$destinationPath = 'uploads/';
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
				
			$data['certLogo'] = $picture;
		}
	
		if($request->input('id')){
			if(Certification::where('id', $request->input('id'))->update($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}else{
			$data['user_id'] = $request->input('user_id');
			if(Certification::insert($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}
	
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}
	
	/**
	 * Save user's experience data
	 * @param Request $request
	 * @return unknown
	 */
	public function experienceSave(Request $request) {
		$data = [
			'designation' => $request->input('designation'),
			'orgName' => $request->input('orgName'),
			'description' => $request->input('description'),
			'startDate' => changeToTimestamp1($request->input('startDate')),
			'endDate' => changeToTimestamp1($request->input('endDate')),
			'city' => $request->input('city'),
			'country' => $request->input('country')
		];
	
		$destinationPath = 'uploads/';
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
	
			$data['logo'] = $picture;
		}
	
		if($request->input('id')){
			if(Experience::where('id', $request->input('id'))->update($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}else{
			$data['user_id'] = $request->input('user_id');
			if(Experience::insert($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}
	
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}
	
	public function getExperiences($user){
		$experiences = Experience::where('user_id', $user)->get();
		
		return view('profile.experience', [
			'experiences'	=> $experiences,
		]);
	}
	
	/**
	 * Save user's training data
	 * @param Request $request
	 * @return unknown
	 */
	public function trainingSave(Request $request) {
		$data = [
			'name' => $request->input('name'),
			'tagLine' => $request->input('tagLine'),
			'startDate' => changeToTimestamp1($request->input('startDate')),
			'endDate' => changeToTimestamp1($request->input('endDate')),
		];
	
		$destinationPath = 'uploads/';
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
	
			$data['logo'] = $picture;
		}
	
		if($request->input('id')){
			if(Training::where('id', $request->input('id'))->update($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}else{
			$data['user_id'] = $request->input('user_id');
			if(Training::insert($data)){
				return json_encode([
					'status' => true,
					'msg'	=> 'Done'
				]);
			}
		}
	
		return json_encode([
			'status' => false,
			'msg'	=> 'Error occured! Try again.'
		]);
	}
	
	/**
	 * record connection request from-to user
	 * @param Request $request
	 * @return unknown
	 */
	public function send_request(Request $request, $to_user){
		$data = [
			'user_id'		=> $to_user,
			'follower_id'	=> Auth::user()->id
		];
		if(intval($to_user)){
			//check if already connected
			$conection = $this->check_connection($to_user, Auth::user()->id);
			if($conection > 0){
				if($request->ajax()){
					return json_encode([
						'status' => false,
						'msg'	=> 'Already Connected.'
					]);
				}else{
					$request->session()->flash('success', 'Already Connected.');
					return redirect('profile/search');
				}
			}
			
			//register connection request for user_id from follower_id
			$data['createdAt'] = Carbon::now();
			$data['updatedAt'] = Carbon::now();
			if(Connection::insert($data)){
				if($request->ajax()){
					return json_encode([
						'status' => true,
						'msg'	=> 'Request Sent successfully.'
					]);
				}else{
					$request->session()->flash('success', 'Request Sent successfully.');
					return redirect('profile/search');
				}
			}
			
			if($request->ajax()){
				return json_encode([
					'status' => false,
					'msg'	=> 'Error occured! Try again.'
				]);
			}else{
				$request->session()->flash('success', 'Error occured! Try again.');
				return redirect('profile/search');
			}
		}
		
		$request->session()->flash('success', 'Error occured! Try again.');
		return redirect('profile/search');
	}

	private function check_connection($to_user, $from_user){
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
	 * accept connection request from the user
	 * @param Request $request
	 * @param int $follower_id
	 * @return redirect
	 */
	public function accept_request(Request $request, $follower_id){
		
		if(intval($follower_id)){
			//check if already connected
			$conection = Connection::where(['follower_id' => $follower_id, 'user_id' => Auth::user()->id, 'status' => 2])->count();
			if($conection == 0){
				$request->session()->flash('success', 'Already Connected.');
				return redirect('profile/search');
			}
				
			//register connection request for user_id from follower_id
			$data = [
				'status'	=> 1,
				'updatedAt' => Carbon::now()
			];
			if(Connection::where(['follower_id' => $follower_id, 'user_id' => Auth::user()->id])->update($data)){
				$request->session()->flash('success', 'Accepted successfully.');
				return redirect('profile');
			}
				
			$request->session()->flash('success', 'Error occured! Try again.');
			return redirect('profile');
		}
	
		$request->session()->flash('success', 'Error occured! Try again.');
		return redirect('profile');
	}

	/**
	 * deny connection request from the user
	 * @param Request $request
	 * @param int $follower_id
	 * @return redirect
	 */
	public function deny_request(Request $request, $follower_id){
		
		if(intval($follower_id)){
			//check if already connected
			$conection = Connection::where(['follower_id' => $follower_id, 'user_id' => Auth::user()->id, 'status' => 2])->count();
			if($conection == 0){
				$request->session()->flash('success', 'Already Connected.');
				return redirect('profile/search');
			}
				
			//register connection request for user_id from follower_id
			$data = [
				'status'	=> 0,
				'updatedAt' => Carbon::now()
			];
			if(Connection::where(['follower_id' => $follower_id, 'user_id' => Auth::user()->id])->update($data)){
				$request->session()->flash('success', 'Denied successfully.');
				return redirect('profile');
			}
				
			$request->session()->flash('success', 'Error occured! Try again.');
			return redirect('profile');
		}
	
		$request->session()->flash('success', 'Error occured! Try again.');
		return redirect('profile');
	}

	/**
	*	Get available reviews for user
	*/
	public function getReviews($user){
		$reviews = Review::where('user_id', $user)->get();
	
		return view('profile.review', [
			'reviews'	=> $reviews,
		]);
	}
}
