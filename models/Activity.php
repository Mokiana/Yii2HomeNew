<?php


namespace app\models;


use app\models\rules\StopTitleValidator;
use yii\base\Model;
use app\components\FileComponent;


class Activity extends Model
{
    public $title;
    public $description;
    public $dateStart;

   // public $isRepeatable;
    public $repeatCount;
    private $repeatCountList=[0=>'не повторять',1=> 'Ежедневно',2=> 'Еженедельно'];

    public function getRepeatCountList(){
        return $this->repeatCountList;
    }

    public $email;
    public $useNotification;

    public $isBlocking;

    public $file;
    public $filename;


    public function beforeValidate()
    {

        if(!empty($this->dateStart)){
            $date=\DateTime::createFromFormat('d.m.Y',$this->dateStart);
            if($date){
                $this->dateStart=$date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title','required'],
            ['description','string','min'=>10],
            ['dateStart','date','format' => 'Y-m-d'],
            ['email','email'],
            ['email','required','when' => function($model){
                return $model->useNotification ==1;
            }],
            [['title'],StopTitleValidator::class],
            ['repeatCount','number','min' => 0],
            [['isBlocking','useNotification'],'boolean'],
            [['file'],'file','extensions'=>['jpg','png','pdf'],'maxFiles' => 5],
            [['filename'],'string']

        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок события',
            'description' => 'Описание',
            'dateStart' => 'Дата начала',
            'repeatCountList' => 'Повторять',
            'repeatCount' => 'Количество повторов',
            'isBlocking' => 'Блоктрующее событие'
        ];
    }
}