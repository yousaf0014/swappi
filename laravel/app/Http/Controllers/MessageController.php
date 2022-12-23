<?php

namespace App\Http\Controllers;

use Carbon;
use App\User;
use App\Ad;
use App\Message;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MessageRepository;
use App\Http\Requests;
use DB;

class MessageController extends Controller
{
	
	/**
	 * The ad repository instance.
	 *
	 * @var AdRepository
	 */
	protected $messages;
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageRepository $messages)
    {
        $this->middleware('auth');
        
        $this->messages = $messages;
    }

    /**
     * Get all users list.
     *
     */
    public function users(Request $request)
    {
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

    	$messages = $this->messages->messagesInConnection(Auth::user());
    	$connections = Auth::user()->friends;
    	$rightCategories = Category::where('status', '!=', 0)->limit(3)->inRandomOrder()->get();
    	
   		//dd(Auth::user()->messagesOfMine()->orderby('createdAt'));
   		$messages = Auth::user()->messages;
   		//dd($messages);
    	
    	return view('messages.users', [
    		'ads'	=> $ads,
    		'connections'	=> $connections,
    		'messages'	=> $messages,
    		'rightCategories'	=> $rightCategories,
    	]);
    }

    /**
     * User messages list.
     *
     */
    public function messages($user)
    {
    	$messages = Message::where([
    		['sender_id', '=', $user],
    		['reciever_id', '=', Auth::id()],
    		['status', '1']
    	])
    	->orWhere([
    		['sender_id', '=', Auth::id()],
    		['reciever_id', '=', $user],
    		['status', '1']
    	])
    	->get();
    	    	
    	return view('messages.index', [
    		'messages' => $messages,
    		'sender'	=> Auth::id(),
    		'reciever'	=> $user,
    	]);
    }
    
    /**
     * save message data
     */
    public function save(Request $request){
    	if ($request->isMethod('post')) {
    		if($request->input('send')){
    			$data = [
    				'sender_id'	=> $request->input('sender'),
    				'reciever_id'	=> $request->input('reciever'),
    				'msgText'	=> $request->input('msgText'),
    				'createdAt'	=> Carbon\Carbon::now()
    			];
    			$msgId = Message::insertGetId($data);
    			
    			echo json_encode([
    				'msgId'	=> $msgId,
    				'status'	=> true
    			]);
    		}
    	}
    }
    
    /**
     * Make status to 0/disable
     * @param unknown $user
     */
    public function delete($user){
    	
    	$data = [
    		'status'	=> 0
    	];
    	
    	Message::where([
    		['sender_id', '=', $user],
    		['reciever_id', '=', Auth::id()],
    	])
        // ->orWhere([
        //     ['reciever_id', '=', $user],
        //     ['sender_id', '=', Auth::id()],
        // ])
    	->update($data);
    	
    	echo json_encode([
    		'msg'	=> 'Deleted !',
    		'status'	=> true
    	]);
    	
    }
    
    /**
     * Make messages unread
     * @param unknown $user
     */
    public function unread($user){
    	 
    	$data = [
    		'isUnread'	=> 0
    	];
    	 
    	Message::where([
    		['sender_id', '=', $user],
    		['reciever_id', '=', Auth::id()],
    	])
    	->update($data);
    	 
    	echo json_encode([
    		'msg'	=> 'Unread !',
    		'status'	=> true
    	]);
    	 
    }
}
