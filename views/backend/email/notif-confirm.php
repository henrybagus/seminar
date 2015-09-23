<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<center>
<h1> Notifikasi Seminar </h1>
<h1> Seminar : <?= Html::encode($event->nama) ?> </h1> 
</center>

<?= Html::a('Back', ['backend/email/mail'], ['class' => 'btn btn-success']) ?>
</br>
</br>
	<?php
		$count = 0;
		foreach($event->absensis as $key => $value) {
	?>				
		 <?= $value->idPeserta->email ?> 
		 </br>
	<?php

			}
	?>
    <?php $form = ActiveForm::begin(); ?>
	<?= $form->field($email, 'sendTo')->textInput(['maxlength' => true]) ?>
	<?= $form->field($email, 'subject')->textInput(['maxlength' => true]) ?>
	<?= $form->field($email, 'content')->textArea(['maxlength' => true]) ?>
	<div class="form-group">
        <?= Html::a('Send',['backend/email/send',
        					'email' => $form
        					], ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
