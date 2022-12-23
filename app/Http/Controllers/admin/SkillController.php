<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Category;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
		
	}
	
	/**
	 * Show Skills.
	 */
	public function index()
	{
		$skills = Skill::orderby('id', 'DESC')->paginate(15);
		return view('admin.skill.index', ['skills' => $skills]);
	}
	
	/**
	 * Create skill form
	 * @return unknown
	 */
	public function create()
	{
		$categories = Category::get();
		return view('admin.skill.create', [
			'categories'	=> $categories
		]);
	}
	
	/**
	 * Edit skill form
	 * @param unknown $catid
	 * @return unknown
	 */
	public function edit($skillid)
	{
		$skill = Skill::where('id', $skillid)->get();
		$categories = Category::get();
		return view('admin.skill.edit', [
			'skill'	=> $skill[0],
			'categories'	=> $categories
		]);
	}
	
	/**
	 * Save skill data into DB
	 * @param Request $request
	 * @return unknown
	 */
	public function save(Request $request)
	{
	
		$data = [
			'skillName'		=> $request->input('title'),
			'category_id'	=> $request->input('category'),
			'status'		=> $request->input('status'),
		];
	
		if($request->input('id')){
			Skill::where('id', $request->input('id'))->update($data);
				
			Session::flash('success', 'Data updated successfully.');
			return redirect('admin/skill/edit/'.$request->input('id'));
		}else{
			if(Skill::insert($data)){
				Session::flash('success', 'Data updated successfully.');
				return redirect('admin/skills');
			}
		}
	}
}
