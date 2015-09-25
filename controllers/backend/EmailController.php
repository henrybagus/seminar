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
   

        $email = new Email();
        if ($email->load(Yii::$app->request->post()) && $email->validate()) {
            $event=Event::findOne($email->id_event);
            $content_template = $email->content;
            $subject_template = $email->subject;
            // $event->absensis;
            foreach($event->absensis as $absensi){
                $temp =$absensi->idPeserta->email;
                echo $temp;
                 
                // echo $absensi->idPeserta->email;
                echo "</br>";
                $subject = str_replace("{nama}", $absensi->idPeserta->nama, $subject_template);
                echo $subject;
                $content = str_replace("{nama}", $absensi->idPeserta->nama, $content_template);
                echo $content;
                echo "</br>";
            
                Yii::$app->mailer
                        ->compose()
                        ->setHtmlBody($content)
                        ->setSubject($subject)
                        ->setTo($absensi->idPeserta->email)
                        ->send();
            }
            exit();

        }
	}
    
	
		public function actionMail()
        {
            $email = new Email();
            $data = Event::find()->all();
        // if ($model->load(Yii::$app->request->get()) && $email->validate()) {
            // $event=Event::findOne($email->id_event);
            return $this->render('notif', ['data'=>$data,
			'email' => $email,
            ]);
        // } else {
        //     return $this->render('notif-confirm', [
        //     'model' => $email,
        //     'data' => $data
        //     ]);
        // }

        }

}
