<?php
require '../vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
/*-----------------------------------------*/
Configuration::instance([
    'cloud' => [
      'cloud_name' => 'dauz6sio9', 
      'api_key' => '983257745251619', 
      'api_secret' => '9H-o4xiO55gT-78W4Zi1YbH3zlY'],
    'url' => [
      'secure' => true]]);
/*-----------------------------------------*/
/*-----------------------------------------*/
/*-----------------------------------------*/
class ApiCloudinary{
    //investigar sobre POO--> programación orientada a objetos;
/*-----------------------------------------*/
public function uploadFile($fileName){
    try{
        $uploadFile = (new UploadApi())->upload($fileName);
        return $uploadFile;
    }catch(Exception $ex){
        echo "error", $ex->getMessage();
    }
}      
/*-----------------------------------------*/
public function destroyFile($imagenId){
    try{
        $destroyFile = (new UploadApi())->destroy($imagenId);
        return $destroyFile;
    }catch(Exception $e){
        echo "error", $e->getMessage();
    }
}
/*-----------------------------------------*/
}
?>