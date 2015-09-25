
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

    <?php $form = ActiveForm::begin(['action'=>['backend/email/send']]); ?>
    <?= $form->field($email, 'id_event')->dropDownList(ArrayHelper::map($data,'id','nama'))->label('Seminar yang tersedia') ?>
	<?= $form->field($email, 'subject')->textInput(['maxlength' => true]) ?>
	<?= $form->field($email, 'content')->textArea(['maxlength' => true]) ?>
	<div class="form-group">
        <?= Html::submitButton('Send',
        ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
