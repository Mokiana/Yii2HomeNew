<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;

class ActivityController extends BaseController
{
   public function actions()
   {
       return [
         'create' => ['class'=>ActivityCreateAction::class]
       ];
   }
}