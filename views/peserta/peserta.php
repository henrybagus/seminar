<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name') ?>
	<?= $form->field($model, 'npm') ?>
	
	<div class ="form-group">
		<?= Html::submitButton('Print', ['class' => 'btn btn-primary']) ?>
	</div>
	
<?php ActiveForm::end() ?>