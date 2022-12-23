<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
		
	}
	
	/**
	 * Show Categories.
	 */
	public function index()
	{
		$categories = Category::orderby('id', 'DESC')->paginate(15);
		return view('admin.category.index', ['categories' => $categories]);
	}
	
	/**
	 * Create category form
	 * @return unknown
	 */
	public function create()
	{
		return view('admin.category.create');
	}
	
	/**
	 * Edit category form 
	 * @param unknown $catid
	 * @return unknown
	 */
	public function edit($catid)
	{
		$category = Category::where('id', $catid)->get();
		return view('admin.category.edit', [
			'category'	=> $category[0]
		]);
	}
	
	/**
	 * Save category data into DB
	 * @param Request $request
	 * @return unknown
	 */
	public function save(Request $request)
	{
		
		$image_name = '';
		$destinationPath = 'uploads/';
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
	
			$image_name = $picture;
		}
		
		$icon_name = '';
		if ($request->hasFile('icon')) {
			$file = $request->file('icon');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$picture = date('His-').$filename;
			$file->move($destinationPath, $picture);
		
			$icon_name = $picture;
		}
		
		$data = [
			'categoryName'			=> $request->input('name'),
			'slug'					=> str_slug($request->input('name')),
			'categoryTitle'			=> $request->input('title'),
			'categoryImage'			=> $image_name,
			'categoryIcon'			=> $icon_name,
			'categoryDescription'	=> $request->input('description'),
			'status'				=> $request->input('status'),
		];
		
		if($request->input('id')){
			if($image_name == '') unset($data['categoryImage']);
			Category::where('id', $request->input('id'))->update($data);
			
			Session::flash('success', 'Data updated successfully.');
			return redirect('admin/category/edit/'.$request->input('id'));
		}else{
			if(Category::insert($data)){
				Session::flash('success', 'Data updated successfully.');
				return redirect('admin/categories');
			}
		}
	}
}
