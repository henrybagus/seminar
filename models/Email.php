<?php

namespace app\models;
use yii\base\Model;

class Email extends Model{
	public $id_event;
    public $subject;
    public $content;

    public function rules()
    {
        return [
            [['id_event','subject', 'content'], 'required'],
        ];
    }

}