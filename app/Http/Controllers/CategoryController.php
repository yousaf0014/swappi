<?php



namespace App\Http\Controllers;



use DB;

use App\Category;

use App\Ad;

use App\User;

use App\Skill;

use App\AdSkill;

use App\AdSwap;

use App\Transaction;

use Illuminate\Http\Request;

use Carbon\Carbon;



use App\Http\Requests;



class CategoryController extends Controller

{

	/**

	 * Create a new controller instance.

	 *

	 * @return void

	 */

	public function __construct()

	{

	

	}

	

	/*

	 * Profile search page

	 */

	public function index($catSlug)

	{

		//get swaped ad ids

        $ads_swaped = AdSwap::where('status', '=', 1)->get()->pluck('ad_id');



		// get category data

		$category = Category::where(['slug'=> $catSlug, 'status' => 1] )->get();

		// find ads that belongs to the category

		$adIds = array_pluck($category[0]->ads, 'ad_id');



		//all categories count

		$all_cat = Category::where('status', 1)->get()->toArray();



		$i = 0;

		foreach ($all_cat as $cat) {

			$ads_c = Ad::join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

				->where('ad_skill.category_id', $cat['id'])

				->where('ads.status', 1)

				->whereNotIn('ads.id', $ads_swaped)

				->with('transactions')

				->whereHas('transactions', function($query){

					// Now querying on transactions

					$query->where('endDate', '>', Carbon::now());

				})

				->count();



			$all_cat[$i]['ads_count'] = $ads_c;

			$i++;

		}

		// dd($all_cat);

		//get ad details by ids

		$catAds = Ad::join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

				->whereIn('ads.id', $adIds)

				->with('transactions')

				->where('ad_skill.category_id', $category[0]->id)

				->whereNotIn('ads.id', $ads_swaped)

				->whereHas('transactions', function($query){

					// Now querying on transactions

					$query->where('endDate', '>', Carbon::now())

							->where('txnType', '!=', 'free');

				})

				->inRandomOrder()

				->where(['ads.status'=> 1])

				->limit(3)

				->get();

		
		$catId = $category[0]->id;

		

		if(isset($_GET['duration'])){

			$duration = $_GET['duration'];

		} else {

			$duration = null;

		}

		$now = Carbon::today();
		$current_time = Carbon::now();

		if($duration == null || $duration == 'all'){

			// get ads other than the category 

			$ads = Ad::select('ads.*','ad_skill.category_id')

				->where('ads.status', 1)

				->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

				->where('ad_skill.category_id', $catId)

				->with('transactions')

				->whereHas('transactions', function($query){

					// Now querying on transactions

					$query->where('endDate', '>', Carbon::now());

				})

				->whereNotIn('ads.id', $ads_swaped)

				->paginate(10);

				// dd($ads);

		} else {

			

			if($duration == 1) {
				$ads = Ad::select('ads.*','ad_skill.category_id')

				->where('ads.status', 1)

				->where('ads.createdAt', '<', Carbon::now())
				->where('ads.createdAt', '>', Carbon::today()->subDays(1))

				->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

				->where('ad_skill.category_id', $catId)

				->with('transactions')

				->whereHas('transactions', function($query){

					// Now querying on transactions

					$query->where('endDate', '>', Carbon::now());

				})
				->whereNotIn('ads.id', $ads_swaped)

				->paginate(10);
			} else {
				$ads = Ad::select('ads.*','ad_skill.category_id')

				->where('ads.status', 1)

				->where('ads.createdAt', '>', $now->subDays($duration))
				->where('ads.createdAt', '<', Carbon::now())

				->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

				->where('ad_skill.category_id', $catId)

				->with('transactions')

				->whereHas('transactions', function($query){

					// Now querying on transactions

					$query->where('endDate', '>', Carbon::now());

				})
				->whereNotIn('ads.id', $ads_swaped)

				->paginate(10);
			}

			

		}




		// all categories

		$categories = Category::where('status' , 1)->get();

		

		// get cities with ads and the category

		$cities = User::select('city')

			->distinct()

			->join('skill_user', 'skill_user.user_id', '=', 'users.id')

			->where('skill_user.category_id', $catId)

			->get();

		// ads count for today

		$todayCount = Ad::where('ads.createdAt', '<', Carbon::now())
			->where('ads.createdAt', '>', Carbon::now()->subDays(1))
			->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();
			
		// ads count for yesterday

		$yesterdayCount = Ad::where('ads.createdAt', '>', Carbon::now()->subDays(2))
			->where('ads.createdAt', '<', Carbon::now())
			->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();

		// ads count for last 3 days

		$threeDayCount = Ad::where('ads.createdAt', '>', Carbon::today()->subDays(3))
			->where('ads.createdAt', '<', Carbon::now())
			->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();

		// ads count for last one week

		$weekCount = Ad::where('ads.createdAt', '>', Carbon::now()->subDays(7))
			->where('ads.createdAt', '<', Carbon::now())
			->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();

		// ads count for last 2 weeks

		$towWeeksCount = Ad::where('ads.createdAt', '>', Carbon::now()->subDays(14))
			->where('ads.createdAt', '<', Carbon::now())
			->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();

		// ads count for all times

		$allCount = Ad::join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')
			->where('ads.createdAt', '<', Carbon::now())
			->where('ad_skill.category_id', $catId)

			->where('ads.status', 1)

			->whereNotIn('ads.id', $ads_swaped)

			->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('endDate', '>', Carbon::now());

			})

			->count();



		//category title last word

		$title = explode(' ', $category[0]->categoryTitle);

		$title[count($title) - 1] = '<strong>'.$title[count($title) - 1].'</strong>';

		$category[0]->categoryTitle = implode(' ', $title);

		

		return view('category.index',[

			'cities'		=> $cities,

			'todayCount'	=> $todayCount,

			'yesterdayCount'=> $yesterdayCount,

			'threeDayCount'	=> $threeDayCount,

			'weekCount'		=> $weekCount,

			'towWeeksCount'	=> $towWeeksCount,

			'allCount'		=> $allCount,

			'category'		=> $category[0],

			'categories'	=> $categories,

			'catAds'		=> $catAds,

			'ads'			=> $ads,

			'slug'			=> $catSlug,

			'count' => 		$all_cat,

		]);

	}



	public function get_ads($catSlug){



		//get swaped ad ids

        $ads_swaped = AdSwap::where('status', '=', 1)->get()->pluck('ad_id');



		// get category data

		$category = Category::where('slug', $catSlug)->get();

		// find ads that belongs to the category

		$adIds = array_pluck($category[0]->ads, 'ad_id');



        //get 10 categories

        $ads = Ad::whereIn('id', $adIds)->whereNotIn('id', $ads_swaped)->where('status', 1)->paginate(10);



        return view('category.category_ads', [

            'ads'   => $ads,

        ]);



    }





    function filter_by_skills(Request $request){

    	$skills = $request->input('skills');

    	$catSlug = $request->input('slug');



    	$ads_swaped = AdSwap::where('status', '=', 1)->get()->pluck('ad_id');



    	// get category data

		$category = Category::where(['slug'=> $catSlug, 'status' => 1] )->get();



		$skills_in  = AdSkill::whereIn('skill_id', explode(',', $skills))->get()->pluck('ad_id');

		$adIds = array_pluck($category[0]->ads, 'ad_id');

		

		// find ads that belongs to the category

		$where_in = array_intersect($adIds, $skills_in->toArray());



    	$ads = Ad::select('ads.*','ad_skill.category_id')

			->whereIn('ads.id', $skills_in)

    		->whereNotIn('ads.id', $ads_swaped->toArray())

    		->join('ad_skill', 'ad_skill.ad_id', '=', 'ads.id')

			->where('ad_skill.category_id', $category[0]->id)

    		->with('transactions')

			->whereHas('transactions', function($query){

				// Now querying on transactions

				$query->where('transactions.endDate', '>', Carbon::now());

			})

    		->where('ads.status', 1)

    		->paginate(10);

    		

    	if (count($ads)) {



    		$html = '';



    		foreach ($ads as $ad) {



    			$img = asset('uploads/' . returnFeaturedImage($ad->adImages));

    			$user = url('profile/user/' . $ad->user->id);

    			$detail = url('ad/' . $ad->id . '/detail');

    			$img_2 = asset('images/vector_byter.png');

    			$img_3 = asset('images/operated_category.png');

    			$date = $ad->createdAt->format('d/m-Y');

    			if(count($ad->transactions) > 0){

            		$trans = $ad->transactions[0]->endDate;

    			} else {

    				$trans = '';

    			}	

				                    		

    			$html .= '<tr>

									<td>

									 <p class="announce_category_p"><img width="80" src="'.$img.'"></p>

									 <div class="announce_category_ad">

									  <p>Udbyder : <a href="'.$user.'"> '.$ad->user->fName.'</a></p>

									  <h1><a href="'.$detail.'">'.$ad->adHeadline.'</a></h1>

									  <p class="byterr_green"><img src="'.$img_2.'">Bytter med '.$ad->inExchange .'</p>

									  <p class="operatted_den"><img src="'.$img_3.'">Oprettet den '.$date.'</p>

									 </div>

									</td>

									<td>'.count($ad->favorite_by_user) .'</td>

									<td>

										'.$trans.'

			                    	</td>

								</tr>';

    		}



    		$return = [

    			'status' => true,

    			'data'	=> $html,

    			'last_id' => '',

    			'count'	=> count($ads)

    		];



    	} else {

    		$html = '<tr><td colspan="3" align="center">No records found</td></tr>';

    		$return =[

    			'status' => false,

    			'data'	=> $html,

    		];

    	}

    	echo json_encode($return);

    	exit;

    }

	





	/**

	 * return categories json for the matching string

	 */

	public function search(Request $request){

		$category = $request->input('category') ? $request->input('category') : '';

		$categories = Category::with(

			['skills' => function($query){

					$query->where('status', 1);

				}

			]

		)->where('status', 1)

		->where('categoryName', 'like', $category . '%')

		->orderBy('sort_number', 'ASC')

		->get();

		echo json_encode($categories);

	}

	

	/**

	 * return skills json for the category

	 */

	public function skills(Request $request){

		$category = $request->input('category') ? $request->input('category') : '';

		if($category != ''){

			echo json_encode(Skill::where('category_id', '=', $category)->where('status', 1)->get());

		}else{

			echo json_encode(

				array(

					'status' => 0,

					'msg'	 => 'Category ID missing'

				)

			);

		}

	}

}

