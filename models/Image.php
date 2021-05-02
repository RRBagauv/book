<?php


namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class Image extends Model
{


    public function CreateFile($model, $image = false){
        $file = UploadedFile::getInstance($model, 'img');
        if(isset($file)){

            $model->img = $this->UploadImage($file, $image);

        }
        return $model->img;

    }

    public function UploadImage(UploadedFile $file, $image = false){

        $fileName = $this->hashImage($file);
        if($this->validate()){

            if($image && file_exists($this->getFolder(). $image)){

                $this->deleteOldImage($image);

            }

            $this->saveNewImage($fileName, $file);

        }
        return $fileName;

    }

    private function saveNewImage($fileName, $file){

        $file->saveAs($this->getFolder(). $fileName);

    }

    private function deleteOldImage($image){

        unlink($this->getFolder() . $image);

    }

    private function hashImage($file){

        return uniqid(strtolower(md5($file->baseName))).'.'.$file->extension;

    }

    private function getFolder(){

        return \Yii::getAlias('@webroot') .'/userfile/';

    }

    public function getImage($image = false){

        if($image){

            return str_replace(' ','', \Yii::getAlias('@web') .'/userfile/'.$image);

        }else{

            return '123123123123';

        }

    }

}