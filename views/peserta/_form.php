<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss(".listsemninar col-lg-6{
	border: 1px solid red;
}");
$this->registerCss(".checkbox{
	background: #;
	height: 16px;
	width: 16px;
	display:inline-block;
	padding: 0 0 0 0px;
");
?>
<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="form col-lg-4">
			<?php echo "Booked for logo"?>
		</div>
		<div class="form col-lg-4">
			<?= $form->field($model, 'nama')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'hp')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'email')->input('email') ?>

			<?= $form->field($model, 'universitas')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'jurusan')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'npm')->textInput(['maxlength' => 255]) ?>
		</div>
		<div class="listsemninar col-lg-4">
			<?php
				echo $form->field($model, 'events')->checkboxList(ArrayHelper::map($model_event,"id","nama"),['separator'=>'</br></br>'])->label('<h3>Seminar yang anda minati:</h3>');
			?>
		</div>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Daftar' : 'Update', ['class' => $model->isNewRecord ? 'btn 	btn-success btn-block' : 'btn btn-primary btn-block']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>