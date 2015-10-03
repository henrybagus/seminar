<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
$this->title = 'Daftar Seminar ';

$this->registerCss(".title{
	text-align: center;
}");
?>
<div class="peserta-create">
	<div class="title">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
    <?= $this->render('_form', [
        'model' => $model,
		'model_event'=>$model_event,
    ]) ?>

</div>
