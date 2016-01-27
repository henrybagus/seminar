
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<center>
<h1> Notifikasi Seminar </h1>
</center>

</br>
</br>

    <?php $form = ActiveForm::begin(['action'=>['backend/email/send2']]); ?>
    <?= $form->field($email, 'id_event')->dropDownList(ArrayHelper::map($data,'id','nama'))->label('Seminar yang tersedia') ?>
	<?= $form->field($email, 'subject')->textInput(['maxlength' => true]) ?>
	<!-- <?= $form->field($email, 'content')->textArea(['maxlength' => true, 'rows' => 10]) ?> -->
    <?= $form->field($email,'content')->widget(letyii\tinymce\Tinymce::className(),['options' => ['rows' => 15]]) ?>
    <p>Autotag yang dapat digunakan: {nama}, {nama_seminar}, {jadwal}.</p>
	<div class="form-group">
        <?= Html::submitButton('Send',
        ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
