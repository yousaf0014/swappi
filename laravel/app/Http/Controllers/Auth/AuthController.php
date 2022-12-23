<?php



namespace App\Http\Controllers\Auth;



use App\User;

use App\Skill;

use Validator;

use Session;

use Mail;

use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class AuthController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Registration & Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users, as well as the

    | authentication of existing users. By default, this controller uses

    | a simple trait to add these behaviors. Why don't you explore it?

    |

    */



    use AuthenticatesAndRegistersUsers, ThrottlesLogins;



    /**

     * Where to redirect users after login / registration.

     *

     * @var string

     */

    protected $redirectTo = '/';



    /**

     * Create a new authentication controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);

    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**

     * Redirect action upon login

     * @param unknown $request

     * @param unknown $user

     * @return unknown

     */

    protected function authenticated($request, $user){

    	if($user->role === 'admin'){

    		return redirect()->intended('admin'); //redirect to admin panel

    	}

    

    	return redirect()->intended($this->redirectTo); //redirect to standard user homepage

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        $messages =  [

            'email.unique' => 'Denne mail er allerede oprettet.',

        ];



        return Validator::make($data, [

            'firstName'    => 'required|max:255',

            'lastName'     => 'required|max:255',

        	//'userName'     => 'required|max:255',

            'email'     => 'required|email|max:255|unique:users',

            'password'  => 'required|min:6',

            //'phone'    => 'required|numeric',

            'country'   => 'required',

            'postCode'  => 'required|numeric',

            // 'profileType' => 'required',

        ], $messages);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    protected function create(array $data)

    {

        $this->redirectTo = '/profile';



    	if(Input::file('profilePic')){

    		$profile_name = rename_file(Input::file('profilePic')->getClientOriginalName());

    		Input::file('profilePic')->move('uploads/', $profile_name);

    	}else{

    		$profile_name = '';

    	}

    	

    	if(Input::file('coverPic')){

    		$cover_name = rename_file(Input::file('coverPic')->getClientOriginalName());

    		Input::file('coverPic')->move('uploads/', $cover_name);

    	}else{

    		$cover_name = '';

    	}

    	

    	$userData = [

    			'fName'     => $data['firstName'],

    			'lName'     => $data['lastName'],

    			//'username'     => $data['userName'],

    			'email'     => $data['email'],

    			'password'  => bcrypt($data['password']),

    			'country'   => $data['country'],

    			//'city'   => $data['city'],

    			'postCode'  => $data['postCode'],

    			// 'profileType' => $data['profileType'],

    			'jobTitle'  => $data['jobTitle'],

    			'businessLine'  => $data['businessLine'],

    			//'businessLink'  => $data['businessLink'],

    			'description'   => $data['description'],

    			'profilePic'    => $profile_name,

    			'coverPic'      => $cover_name,
                'created_timestamp' => Carbon::now()->timestamp

    	];

    	//return User::create($userData);

    	

    	        $userModel = new User($userData);

    	        $userModel->save();

    	        $userData['id'] = $userModel->id;

    	

    	        $user = User::find($userData['id']);

    	

    	        //Send Email notification to admin

    	        Mail::send('admin.emails.new_user', $userData, function ($message) use ($data) {

    	        	$message->from('prasad.bodas@itexpertsindya.com');

    	        

    	        	$message->to('prasad.bodas@itexpertsindya.com')->subject('Swappi New User Registered');

    	        });

    	        

    	        if($data['skills'] <> ''){

    		        $postSkills = explode(',', trim($data['skills'], ', '));

    		        $postSkills = array_map('trim', $postSkills);

    		        $skills = Skill::whereIn('skillName', $postSkills)->get();

    	 

    		        foreach ($skills as $skill){

    		        	$user->skills()->attach($skill->id, ['category_id' => $skill->category_id]);

    		        }

    	        }

    	

    	        return $user ? $user : false;

    }

    

    /**

     * Redirect the user to the social provider authentication page.

     *

     * @return Response

     */

    public function redirectToProvider($provider)

    {

    	return Socialite::driver($provider)->redirect();

    }

    

    /**

     * Obtain the user information from social provider.

     *

     * @return Response

     */

    public function handleProviderCallback($provider)

    {

    	try {

    		$user = Socialite::driver($provider)->user();

    	} catch (Exception $e) {

    		return Redirect::to('/auth/login');

    	}

    

    	$authUser = $this->findOrCreateUser($user, $provider);

    

    	auth()->login($authUser, true);

    

    	return redirect()->to('/');

    }

    

    /**

     * Return user if exists; create and return if doesn't

     *

     * @param $socialLiteUser

     * @param $key

     * @return User

     */

    private function findOrCreateUser($socialLiteUser, $key)

    {

    

    	$user = User::updateOrCreate([

    		'email' => $socialLiteUser->email,

    	], [

    		$key . '_id' => $socialLiteUser->id,

    		'name' => $socialLiteUser->name

    	]);

    

    

    	return $user;

    }

}

