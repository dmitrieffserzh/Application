<?php
//GET IMAGE PATH
function getImage($size, $image_name){
    if($size == 'original' && $image_name) {
        //return public_path('uploads/images/original/'.$image_name);
        return '/uploads/images/original/'.$image_name;
    } elseif ($size == 'normal' && $image_name) {
        //return public_path('uploads/images/normal/'.$image_name);
        return '/uploads/images/normal/'.$image_name;
    } elseif ($size == 'thumbnail' && $image_name) {
        //return public_path('uploads/images/thumbnails/'.$image_name);
        return '/uploads/images/thumbnails/'.$image_name;
    }
    return '/images/user.png';
}