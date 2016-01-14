<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Image
{
    static function upload($fileName, $newFileName, $path)
    {
        return Upload::save($fileName, $newFileName, $path);
    }
}