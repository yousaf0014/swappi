<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Ad;
use App\AdSkill;
use App\Skill;
use App\AdImage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
    	
    }

    /**
     * Show ads.
     */
    public function index()
    {
    	$ads = Ad::orderby('id', 'DESC')->paginate(15);
        return view('admin.ads.index', ['ads' => $ads]);
    }
    
    /**
     * Edit Ad form.
     */
    public function edit($adid)
    {
    	$ad = Ad::where('id', $adid)->get();
    	
    	$skills = Skill::get();
    	$adSkills = AdSkill::where('ad_id', '=', $adid)->get();
    	$adSkillIds = array_pluck($adSkills, 'skill_id');
    	
    	return view('admin.ads.edit', [
    		'ad'		=> $ad[0],
    		'skills'	=> $skills,
    		'adSkillIds'	=> $adSkillIds
    	]);
    }
    
    /**
     * save ad's details
     */
    public function save(Request $request){
    	
    	//prepare image data for ad
    	$adImages = $request->input('adImages');
    	$adImages = AdImage::select('id')->whereNotIn('id', $adImages)->where('ad_id', $request->input('id'))->get();
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
    	
    	//prepare and store ad data
    	$data = [
			'adHeadline' 	=> $request->input('title'),
			'slug'			=> $request->input('slug'),
			'adDescription'	=> $request->input('description'),
			'inExchange'	=> $request->input('inExchange'),
			'isFeatured'	=> $request->input('isFeatured'),
			'status'		=> $request->input('status')
    	];
    	Ad::where('id', $request->input('id'))->update($data);
    	
    	//store ad image data
    	foreach ($dataImage as $k => $image){
    		$dataImage[$k]['ad_id'] = $request->input('id');
    	}
    	AdImage::insert($dataImage);
    	
    	//prepare and store skills for the ad
    	$skills = explode(':', $request->input('skills'));
    	$dataSkill = [
			'ad_id'			=> $request->input('id'),
			'skill_id'		=> $skills[1],
			'category_id'	=> $skills[0]
    	];
    	AdSkill::where('id', $request->input('adskillid'))->update($dataSkill);
    	
    	Session::flash('success', 'Data updated successfully.');
    	return redirect('admin/ad/edit/'.$request->input('id'));
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
}
