<?php


namespace app\components;


class DayComponent
{
    public $day_class;

    public function init()
    {

        parent:: init();

        if (empty($this->day_class)) {
            throw new \Exception('Need day_class param');
        }
    }

    public function getModel()
    {
        return new $this->day_class;
    }
}
