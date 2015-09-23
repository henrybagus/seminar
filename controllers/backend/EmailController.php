<?php

namespace app\controllers\backend;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Event;
use app\models\Email;
use app\models\AbsensiForm;
class EmailController extends Controller
{
	public function actionSend()
	{ 
        

	   echo $email->content;
    // Yii::$app->mailer
    // ->compose('backend/notif-confirm', ['email' => $email])
    // ->setTo('email@email.com')
    // ->send();
	}
    
	
		public function actionMail()
        {
            $model = new AbsensiForm();
		    $email = new Email();
            $data = Event::find()->all();
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $event=Event::findOne($model->id_event);
            return $this->render('notif-confirm', ['event' => $event,
			'email' => $email,
            ]);
        } else {
            return $this->render('notif', [
            'model' => $model,
            'data' => $data
            ]);
        }
    }
}
