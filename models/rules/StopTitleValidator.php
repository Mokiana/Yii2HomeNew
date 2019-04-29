<?php


namespace app\models\rules;


use yii\validators\Validator;

class StopTitleValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if($model->$attribute=='admin'){
            $model->addError($attribute,'значение заголовка недопустимо');
        }
    }

}