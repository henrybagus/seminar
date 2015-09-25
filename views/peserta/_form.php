<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'universitas')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'npm')->textInput(['maxlength' => 255]) ?>
	
	<div class="seminarlist">
		</br>
		<?php
			echo $form->field($model, 'events')->checkboxList(ArrayHelper::map($model_event,"id","nama"),['separator'=>'</br></br>'])->label('<h3>Seminar yang anda minati:</h3></br></br>');
		?>
	</div>
	<br><br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
