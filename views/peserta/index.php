<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesertaSearch */
/* <img src="<?=yii::$app->request->baseurl;?>/img/logo.png"/>  */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peserta- Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="<?=yii::$app->request->baseurl;?>/css/custom.css" rel="stylesheet" />
<div class="peserta-index">

    <h1 id="judul"><?= Html::encode($this->title) ?></h1>
	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Peserta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'hp',
			'email',
			'universitas',
			'jurusan',
			'npm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
