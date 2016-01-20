<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Encrypt {

	private static $Key = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 
    static  function encript ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Helpers_Encrypt::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Helpers_Encrypt::$Key))));
        return $output;
    }
 
    static  function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Helpers_Encrypt::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Helpers_Encrypt::$Key))), "\0");
        return $output;
    }
}