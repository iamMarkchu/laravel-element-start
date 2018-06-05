<?php
/**
 * Created by PhpStorm.
 * User: chukui
 * Date: 5/25/2018
 * Time: 12:58 AM
 */
use Illuminate\Support\Facades\Storage;
if (!function_exists('upload'))
{
    function upload($file, $name)
    {
        return Storage::disk('public')->putFile($name, $file);
    }
}