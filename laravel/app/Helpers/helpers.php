<?php

use Carbon\Carbon;

	/**
	 * Rename files by appending random string
	 * 
	 * @param $file_name
	 * @return $file_name
	 */
	function rename_file($file_name)
	{
		$file_name = explode('.', $file_name);
	    $file_name[0] = $file_name[0] . str_random(5);
	    return implode('.', $file_name);
	}

	/**
	 * Create profile image link
	 * 
	 * @param $file_name
	 * @return $link
	 */
	function profile_image_link($file_name, $w = 270, $h = 270)
	{
		if(empty($file_name)){
			$file_name = 'default-avatar.png';
		}

		//return asset('uploads/'.$file_name);
		return asset(Croppa::url('uploads/'.$file_name, $w, $h));
	}

	/**
	 * Create cover image link
	 * 
	 * @param $file_name
	 * @return $link
	 */
	function cover_image_link($file_name)
	{
		if(empty($file_name)){
			$file_name = 'default-cover.png';
		}
	
		return asset('uploads/'.$file_name);
	}

	/**
	 * Create star ratting
	 */
	function print_ratting($ratting){
		$return = '<ul class="nav ratting">';
			for ($i = 1; $i <= 5; $i++ ){
				$return .= '<li class="';
				if($ratting >= $i) $return .= 'green-star';
				$return .= '"><i class="fa fa-heart" aria-hidden="true">&nbsp;</i></li>';
			}
		$return .= '</ul>';
		
		return $return;
	}

	function get_ratting(){
		$return = '<ul class="nav ratting get-ratting">';
			for ($i = 1; $i <= 5; $i++ ){
				$return .= '<li class="">
					<input type="radio" name="ratting" id="rate-'.$i.'" data-rate="'.$i.'" class="hide rate rate-'.$i.'" value="'.$i.'" />
					<label class="rate rate-'.$i.'" data-rate="'.$i.'" for="rate-'.$i.'">
						<i class="fa fa-heart" aria-hidden="true">&nbsp;</i>
					</label>
				</li>';
			}
		$return .= '</ul>';
		
		return $return;
	}

	/**
	 * Get average for star rattings
	 */
	function average_ratting($reviews){
		$i = 0;
		$ratting = 0;
		foreach($reviews as $review){
			$ratting = $ratting + $review->ratting;
			$i++;
		}
		
		return $i == 0 ? 0 : floor($ratting / $i);
		//return array_sum(array_pluck($reviews, 'ratting')) / count($reviews);
	}

	/**
	 * Get status icon
	 * @param unknown $status
	 * @return string
	 */
	function status_icons($status){
		if($status){
			return '<i class="fa fa-check"></i>';
		}else{
			return '<i class="fa fa-times"></i>';
		}
	}
	
	/**
	 * change time format "dd /mm-yyyy" to "yyy-mm-dd hh:ii:ss"
	 * @param unknown $time
	 * @return string
	 */
	function changeToTimestamp($time){
		$created = explode(' /', $time);
		$created[1] = explode('-', $created[1]);
		$return = $created[1][1].'-'.$created[1][0].'-'.$created[0];
		return $return;
	}

	/**
	 * change time format "dd/mm/yy" to "yyy-mm-dd hh:ii:ss"
	 * @param unknown $time
	 * @return string
	 */
	function changeToTimestamp1($time){
		$created = explode('/', $time);
		$return = $created[2].'-'.$created[1].'-'.$created[0];
		return $return;
	}
	
	/**
	 * Remove "T" and "Z" from payment date time
	 * @param unknown $datetime
	 * @return unknown
	 */
	function changePaymentDatetime($datetime){
		$datetime = str_replace('T', ' ', $datetime);
		$datetime = str_replace('Z', ' ', $datetime);
		return $datetime;
	}
	
	/**
	 * 
	 * @param unknown $amount
	 * @return unknown
	 */
	function currencyFormat($amount){
		return number_format(($amount/100), 2);
	}
	
	/**
	 * 
	 * @param unknown $month
	 * @return unknown
	 */
	function dateMonthLocale($month){
		$months = [
			'Januar' 	=> 'January', 
			'Februar'	=> 'February',
			'Marts'		=> 'March',
			'April'		=> 'April',
			'Maj'		=> 'May',
			'Juni'		=> 'June',
			'Juli'		=> 'July',
			'August'	=> 'August',
			'September'	=> 'September',
			'Oktober'	=> 'October',
			'November'	=> 'November',
			'December'	=> 'December'				
		];
		
		return array_search($month, $months);
	}

	/**
	 * 
	 * @param unknown $startDate
	 * @param unknown $endDate
	 * @return unknown
	 */
	function dateDiff($startDate, $endDate){
		$start = Carbon::parse($startDate);
		$end = Carbon::parse($endDate);
		return $end->diff($start)->format('%y år %m måneder');
	}
	
	function returnFeaturedImage($adImages){
		$featured = $adImages[0]->image; 
		
		foreach($adImages as $image){
			if($image->isFeatured == 1){
				$featured = $image->image;
			}
		}
		
		return $featured;
	}

