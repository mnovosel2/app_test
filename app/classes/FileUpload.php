<?php
/**
 * Created by PhpStorm.
 * User: YogurtBox
 * Date: 21.11.2014.
 * Time: 15:57
 */

class  FileUpload {

    public static function saveImage($path, $key){

        try {

            Input::file($key)->move(public_path().$path, Input::file('avatar')->getClientOriginalName());

            return true;

        }catch (Exception $e){

            return false;

        }

    }

} 