<?php
namespace App\Helper;
use File;
use Config;
use Image;
class imageUpload{
    static  function singleUpload($directory,$file,$width="",$height=""){

        $dir ='images/'.$directory;

        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            $filename=  'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$file->getClientOriginalExtension();
            $path= public_path($dir.'/'.$filename);
            if(empty($width) or empty($height)){
                Image::make($file->getRealpath())->save($path);
            }else{
                Image::make($file->getRealpath())->resize($width,$height)->save($path);
            }

            return Config::get('app.url')."/".$dir."/".$filename;
        }else{
            return "";
        }
    }

    static  function singleUploadUpdate($directory,$file,$data,$field,$width="",$height=""){

        $dir ='images/'.$directory;

        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            $dltname= (explode("/",$data[0]->$field));
            File::delete(public_path()."/".$dir."/".end($dltname));
            $filename=  'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$file->getClientOriginalExtension();
            $path= public_path($dir.'/'.$filename);
            Image::make($file->getRealpath())->resize($width,$height)->save($path);
            return Config::get('app.url')."/".$dir."/".$filename;
        }else{
            return $data[0]->$field;
        }
    }

    static  function singleUploadUpdatejson($directory,$file,$field,$width="",$height=""){

        $dir ='images/'.$directory;

        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            $dltname= (explode("/",$field));
            File::delete(public_path()."/".$dir."/".end($dltname));
            $filename=  'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$file->getClientOriginalExtension();
            $path= public_path($dir.'/'.$filename);
            Image::make($file->getRealpath())->resize($width,$height)->save($path);
            return Config::get('app.url')."/".$dir."/".$filename;
        }else{
            return $field;
        }
    }
    static  function imgdlt($directory,$file){

        $dir ='images/'.$directory;

        if(!empty($file)){
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            $dltname= (explode("/",$file));
            File::delete(public_path()."/".$dir."/".end($dltname));
            return true;
        }else{
            return "";
        }
    }


    static  function delete($directory,$data){
        $dir ='images/'.$directory;
        $dltname= (explode("/",$data));
        File::delete(public_path()."/".$dir."/".end($dltname));

    }
}
