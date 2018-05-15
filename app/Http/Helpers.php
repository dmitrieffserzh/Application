<?php
//GET IMAGE PATH
function getImage($size, $image_name){
    if($size === 'original' && $image_name) {
        //return public_path('uploads/images/original/'.$image_name);
        return '/uploads/images/original/'.$image_name;
    } elseif ($size === 'cover' && $image_name) {
        //return public_path('uploads/images/covers/'.$image_name);
        return '/uploads/images/covers/' . $image_name;
    } elseif ($size === 'normal' && $image_name) {
        //return public_path('uploads/images/normal/'.$image_name);
        return '/uploads/images/normal/'.$image_name;
    } elseif ($size === 'thumbnail' && $image_name) {
        //return public_path('uploads/images/thumbnails/'.$image_name);
        return '/uploads/images/thumbnails/'.$image_name;
    }
    return '/images/user.png';
}


// GET SEX
function getSex($sex_int){
	if($sex_int == 1) {
		return 'Мужской';
	} else if($sex_int == 2) {
		return 'Женский';
	}

	return 'Ошибка! Пол не определен!';
}


// GET ONLINE ON SEX
function getOnlineTime($sex_int, $time){
	if($sex_int == 1) {
		return 'заходил '.$time;
	} elseif ($sex_int == 2) {
		return 'заходила '.$time;
	}

	return $time;
}