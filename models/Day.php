<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $isWorkDay;

    public $Activity;

    public function rules()
    {
        return [
            ['isWorkDay','boolean'],
            ['Activity',[[]]]
            ];
    }

}