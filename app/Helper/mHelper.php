<?php
namespace App\Helper;

class mHelper{
    static function permalink($deger) {

        $turkce=array("ş","Ş","ı","(",")","","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");
        $duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U");
        $deger=str_replace($turkce,$duzgun,$deger); //$turkce değişkenindeki dizi ile $duzgun değişkenindeki dizinin yer değiştirilmesi
        $deger = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger);
        return $deger."-".rand(1000,100000);
    }

    static function slug($deger) {

        $turkce=array("ş","Ş","ı","(",")","","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");
        $duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U");
        $deger=str_replace($turkce,$duzgun,$deger); //$turkce değişkenindeki dizi ile $duzgun değişkenindeki dizinin yer değiştirilmesi
        $deger = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger);
        return  strtolower($deger);
    }

    static function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'mrk232313';
        $secret_iv = 'muni123';
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    static  function  trueanswer($value){
        switch ($value){
            case "a":
                return "answera";
            case "b":
                return "answerb";
            case "c":
                return "answerc";
            case "d":
                return "answerd";

        }
    }
}
