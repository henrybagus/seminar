<?php

namespace app\controllers;

use Yii;
use app\models\Peserta;
use app\models\PesertaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Event;

/**
 * PesertaController implements the CRUD actions for Peserta model.
 */
class PesertaController extends Controller
{
    public function behaviors()
    {
        return [
        ];
    }

    public function actionHome(){
        $model_event= Event::find()->all();
        $this->layout = 'frontend.php';
    
        return $this->render('home', [
            'model_event'=>$model_event,
        ]);
    }


    /**
     * Creates a new Peserta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peserta();

        $this->layout = 'frontend.php';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $subject = "Pendaftaran Seminar di Unpar Career Expo";
            $content = "Dear {$model->nama}, <br>
            Terima kasih telah mendaftar di seminar Unpar Career Expo November 2015. <br>
            Berikut adalah daftar seminar yang Anda ikuti:<br><br>
            <ul>
            ";

            foreach($model->eventsData as $event){
                $content .= "<li><span class='event-detail'><b>{$event->nama}</b><br>{$event->deskripsi}<br><small>{$event->jadwal}</small></span><br><br></li>";
            }

            $content .= "</ul><br><br>
            <b>Lokasi Seminar: </b><br>
            Universitas Katolik Parahyangan <br>
            Jl. Ciumbuleuit No. 94 <br>
            Bandung - 40141 <br>
            Gedung Rektorat <br>
            Ruang Operation Room <br><br>
            Sampai jumpat di acara seminarnya. Jika memerlukan bantuan silakan hubungi kami di:<br>
            +62-22-2032655 ext. 100120 / 100126 <br>
            Dian - 0857 4105 3212<br><br>
            Best regards,<br>Panitia Unpar Career Expo & Seminar";

            Yii::$app->mailer
                ->compose()
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setHtmlBody($content)
                ->setSubject($subject)
                ->setTo($model->email)
                ->send();

             Yii::$app->session->setFlash('success', 'Pendaftaran berhasil! Terima kasih.');
             return $this->refresh();
        } else {
			$model_event= Event::find()->all();

            return $this->render('create', [
                'model' => $model,
				'model_event'=>$model_event,
            ]);
        }
    }

    /**
     * Finds the Peserta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peserta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peserta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
