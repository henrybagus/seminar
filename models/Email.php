<?php

namespace app\models;
use yii\base\Model;

class Email extends Model{
    public $subject;
    public $sendTo;
    public $content;

    public function rules()
    {
        return [
            [['subject', 'sendTo', 'content'], 'required'],
        ];
    }

}