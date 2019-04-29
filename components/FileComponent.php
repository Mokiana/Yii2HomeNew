<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class FileComponent extends Component
{
    public function getUploadedFile(Activity $model,$attr){
        $file=UploadedFile::getInstances($model,$attr);
        return $file;
    }

    public function genFileName(UploadedFile $file){
        $file=uniqid().'.'.$file->getExtension();
        return $file;
    }

    public function genFilePath($file_name){
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images'));
        $path=\Yii::getAlias('@webroot/images/'.$file_name);
        return $path;
    }

    public function saveUploadedFile(UploadedFile $file,$path):bool {
        return $file->saveAs($path);
    }
}