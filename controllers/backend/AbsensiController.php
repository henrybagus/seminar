<?php

namespace app\controllers\backend;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Absensi;
use app\models\AbsensiForm;
use app\models\AbsensiSearch;
use app\models\Event;
use app\models\PesertaSearch;
use arturoliveira\ExcelView;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class AbsensiController extends Controller{

	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter:: className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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

    /**
     * Lists all Absensi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbsensiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Absensi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Absensi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Absensi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Absensi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Absensi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Absensi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Absensi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Absensi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	//function memilih seminar yang akan diabsensi
	public function actionEntry()
    {
        $model = new AbsensiForm();
        $data = Event::find()->all();
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $event=Event::findOne($model->id_event);
            return $this->render('absensi-confirm', ['event' => $event]);
        } else {
            return $this->render('absensi', [
            'model' => $model,
            'data' => $data
            ]);
        }
    }

	//function setelah mengklik kehadiran
    public function actionRefresh()
    {
        $id = Yii::$app->request->get('id');
        $model = Absensi::findOne($id);
        if ($model!=null) {
            if ($model->kehadiran == 1) {
                $model->kehadiran = 0;
                $model->save();
            } else {
				//hadir
				$subject = "Terima Kasih Telah Hadir di Seminar Unpar Career Expo";
	            $content = "Dear {$model->idPeserta->nama}, <br>
	            Terima kasih telah hadir di seminar <b>{$model->idEvent->nama}</b>.<br>
				Mudah-mudahan dapat bermanfaat untuk Anda.<br>
				Jika ada masukan untuk seminarnya jangan ragu untuk mengirimkannya ke email career.expo@unpar.ac.id<br><br>
	            Best regards,<br>Panitia Unpar Career Expo & Seminar";
                $model->kehadiran = 1;
                $model->save();
				Yii::$app->mailer
	                ->compose()
	                ->setFrom(Yii::$app->params['adminEmail'])
	                ->setHtmlBody($content)
	                ->setSubject($subject)
	                ->setTo($model->idPeserta->email)
	                ->send();
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionExport()
    {
        $searchModel = new PesertaSearch();
        $id = Yii::$app->request->get('id_event');
        // $query = new Query;
        // $query = $query->from('absensi')->innerJoin('peserta','id_peserta = peserta.id', $id);

        $dataProvider = $searchModel->searchByEvent($id);
            ExcelView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'fullExportType' => 'xlsx',
                'grid_mode' => 'export',
                'columns' => [
                    ['class' => 'yii\grid\serialColumn'],
                    'id',
                    'nama',
                    'universitas',
                    'jurusan',
                ],
            ]);
        // }
    }




}
?>
