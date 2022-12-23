<?php
namespace App\Http\Controllers\admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pages;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	/**
	*	Renders view for all pages 
	*
	**/
	public function index(){
		
		$pages = Pages::get();
		
		return view('admin.pages.index', [
			'pages' => $pages
		]);
		
	}
	
	/**
	*	Renders view for editing a page
	*	
	*	@param int page_id
	*	@return void
	*/
	public function EditPage($page_id){
		
		$page = Pages::where('id', $page_id)->get()->first();
		
		return view('admin.pages.edit', [
			'page' => $page
		]);
		
	}
	
	/**
	*	Updates post request to the db
	*
	*	@return void
	*/
	public function SavePage(Request $request){
		$data = [
			'page_name'		=> $request->input('name'),
			'page_content'	=> $request->input('content'),
		];
		
		if(strip_tags(trim($data['page_content'])) == ''){
			Session::flash('success', 'Please add some content to your page');
			return redirect('admin/page/edit/'.$request->input('id'));
		}
	
		if($request->input('id')){
			Pages::where('id', $request->input('id'))->update($data);
				
			Session::flash('success', 'Data updated successfully.');
			return redirect('admin/page/edit/'.$request->input('id'));
		}else{
			
			Session::flash('success', 'Something went wrong');
			return redirect('admin/pages');
			
		}
		
	}

}