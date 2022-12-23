<?php 
function getManu(){
    return FayazSons\Content::getManu(); 
}
function cmskey($key,$striptags = false){
    if(\Auth::user()){
        return '<a href="'.url('/Texts/editByKey/'.$key).'" target="_blank">'.$key.'</a>';
    }else{
        $val = \FayazSons\Text::getValBykey($key);    
        if($striptags ==  true){
            $val = strip_tags($val);
        }
    }
    return $val;
}
function flash($message,$level = 'info'){
	session()->flash('flash_message',$message);
	session()->flash('flash_message_level',$level);
}
function stringToSlug($str){
	$str = strtolower(trim($str));
    // replace all non valid characters and spaces with an underscore
    $str = preg_replace('/[^a-z0-9-]/', '_', $str);
    $str = preg_replace('/-+/', "_", $str);
    return $str;
}
function cropCentered($srPath, $desPath, $img, $w, $h) {
    $data = getimagesize($srPath . $img);
    $hr = $data[1] / $h;
    $wr = $data[0] / $w;
    $imgH = $imgW = 0;
    if ($wr < $hr) {
        $imgH = $h * $wr;
        $imgW = $w * $wr;
    } else {
        $imgH = $h * $hr;
        $imgW = $w * $hr;
    }
    $cx = $data[0] / 2;
    $cy = $data[1] / 2;
    $x = $cx - $imgW / 2;
    $y = $cy - $imgH / 2;
    if ($x < 0)
        $x = 0;
    if ($y < 0)
        $y = 0;
    return cropImage($srPath, $desPath, $img, $x, $y, $imgW, $imgH);
}

function cropImage($srPath, $path, $image, $X, $Y, $targ_w, $targ_h) {
    ini_set("memory_limit", "256M");
    if (!is_dir($path)) {
        mkdir($path, 777);
    }
    $caption = $image;
    $data = getimagesize($srPath . $image);

    $org_w = $data[0];
    $org_h = $data[1];

    $jpeg_quality = 90;
    if ($org_w > $targ_w) {
        $org_w = $targ_w;
    }
    if ($org_h > $targ_h) {
        $org_h = $targ_h;
    }

    $imageName = $image;
    $ext = @strtolower(array_pop(explode(".", $imageName)));
    $src = $srPath . $imageName;

    $img_r = null;
    if ($ext == 'gif') {
        $img_r = imagecreatefromgif($src);
    } else if ($ext == 'png') {
        $img_r = imagecreatefrompng($src);
    } else {
        $img_r = imagecreatefromjpeg($src);
    }

    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
    imagecopyresampled($dst_r, $img_r, 0, 0, $X, $Y, $targ_w, $targ_h, $org_w, $org_h);

    $image_location = $path . $imageName;
    if (file_exists($image_location)) {
        unlink($image_location);
    }
    if ($ext == 'gif') {
        imagegif($dst_r, $image_location);
    } else if ($ext == 'png') {
        imagepng($dst_r, $image_location);
    } else {
        imagejpeg($dst_r, $image_location, $jpeg_quality);
    }
    return;
}
function make_thumb($src, $dest, $desired_width, $ext) {
    $jpeg_quality = 80;
    $source_image = null;
    if ($ext == 'gif') {
        $source_image = imagecreatefromgif($src);
    } else if ($ext == 'png') {
        $source_image = imagecreatefrompng($src);
    } else {
        $source_image = imagecreatefromjpeg($src);
    }

    /* read the source image */
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    if ($ext == 'gif') {
        imagegif($virtual_image, $dest);
    } else if ($ext == 'png') {
        imagepng($virtual_image, $dest);
    } else {
        imagejpeg($virtual_image, $dest, $jpeg_quality);
    }
}

function YMD2MDY($date, $join = '-') {
    $dateArr = preg_split("/[- ]/", $date);
    return $dateArr[1] . $join . $dateArr[2] . $join . $dateArr[0];
}

function rtime($date, $join = '-') {
    $dateArr = preg_split("/[-: ]/", $date);
    return date("H:i:s", mktime($dateArr[3], $dateArr[4], $dateArr[5], $dateArr[1], $dateArr[2], $dateArr[0]));
}


