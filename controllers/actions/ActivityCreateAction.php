<?php


namespace app\controllers\actions;


use app\components\ActivityComponent;
use app\components\RbacComponent;
use app\models\Activity;
use yii\base\Action;
use app\components\FileComponent;
use yii\web\HttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends Action
{

    /** @var RbacComponent */
    public $rbac;

    public function run()
    {
        if(!$this->rbac->canCreateActivity()){
            throw new HttpException(403,'Not access create activity');
        }

        $model=\Yii::$app->activity->getModel();
        $comp=\Yii::createObject(['class'=>ActivityComponent::class,'activity_class'=>Activity::class,'file_component' => FileComponent::class]);
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());

            if(\Yii::$app->request->isAjax){
             \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

        if($comp->createActivity($model)){
                if(!$model->filename){
                    return $this->controller->render('viewEmpty',['model' => $model]);
                }else {
                    return $this->controller->render('view', ['model' => $model]);
                }
        }else{
//            print_r($model->getErrors());exit;
            $model->file=null;
        };

        }


        return $this->controller->render('create',['model'=>$model]);

    }



}