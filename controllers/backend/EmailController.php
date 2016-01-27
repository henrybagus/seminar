<?php

namespace app\controllers\backend;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Event;
use app\models\Email;
use app\models\Peserta;
use app\models\AbsensiForm;

class EmailController extends Controller
{
	public function behaviors(){
		return [
			'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
		];
	}

	public function actionBroadcast(){
        $peserta = Peserta::find()->all();
		foreach($peserta as $key){
            $temp = $key->email;
            echo $temp;
        }
	}
	
	public function actionSend2(){
		 //broadcast semua
        $email = new Email();
       if ($email->load(Yii::$app->request->post()) && $email->validate()) {
        $peserta = Peserta::find()->all();
        foreach($peserta as $key){
            $temp = $key->email;
			echo $temp;
            $content_template = $email->content;
            //mengambil subjek dari email yang akan dikirimkan
            $subject_template = $email->subject;

            $subject = str_replace("{nama}", $key->nama, $subject_template);
                
            $content = str_replace("{nama}", $key->nama, $content_template);
                
            echo "</br>";
            Yii::$app->mailer
                     ->compose()
                     ->setFrom(Yii::$app->params['adminEmail'])
                     ->setHtmlBody($content)
                     ->setSubject($subject)
                     ->setTo($temp)
                     ->send();
            }
        }
        
		
	}
	
	public function actionSend()
	{

   //      //broadcast semua
   //      $email = new Email();
   //     if ($email->load(Yii::$app->request->post()) && $email->validate()) {
   //      $peserta = Peserta::find()->all();
   //      foreach($peserta as $key){
   //          $temp = $key->email;
			// echo $temp;
   //          $content_template = $email->content;
   //          //mengambil subjek dari email yang akan dikirimkan
   //          $subject_template = $email->subject;

   //          $subject = str_replace("{nama}", $key->nama, $subject_template);
                
   //          $content = str_replace("{nama}", $key->nama, $content_template);
                
   //          echo "</br>";
   //          Yii::$app->mailer
   //                   ->compose()
   //                   ->setFrom(Yii::$app->params['adminEmail'])
   //                   ->setHtmlBody($content)
   //                   ->setSubject($subject)
   //                   ->setTo($temp)
   //                   ->send();
   //          }
   //      }
        

        //send per event
        $email = new Email();
        if ($email->load(Yii::$app->request->post()) && $email->validate()) {
            //mengambil event yang dipilih
            $event=Event::findOne($email->id_event);
            //mengambil content dari email yang akan dikirimkan
            $content_template = $email->content;
            //mengambil subjek dari email yang akan dikirimkan
            $subject_template = $email->subject;

            foreach($event->absensis as $absensi){
                $temp =$absensi->idPeserta->email;
                echo $temp;

                // echo $absensi->idPeserta->email;
                echo "</br>";
                $subject = str_replace("{nama}", $absensi->idPeserta->nama, $subject_template);
                $subject = str_replace("{nama_seminar}", $event->nama, $subject);
                $subject = str_replace("{jadwal}", $event->jadwal, $subject);

                $content = str_replace("{nama}", $absensi->idPeserta->nama, $content_template);
                $content = str_replace("{nama_seminar}", $event->nama, $content);
                $content = str_replace("{jadwal}", $event->jadwal, $content);

                Yii::$app->mailer
                        ->compose()
						->setFrom(Yii::$app->params['adminEmail'])
                        ->setHtmlBody($content)
                        ->setSubject($subject)
                        ->setTo($temp)
                        ->send();
            }

        }
	}

	public function actionMail()
    {
        $email = new Email();
        $data = Event::find()->all();
        return $this->render('notif', ['data'=>$data,	
                                      'email' => $email,
        ]);

    }

}
