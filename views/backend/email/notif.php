<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<?php $form = ActiveForm::begin(['method'=>'get']); ?>

    <?= $form->field($model, 'id_event')->dropDownList(ArrayHelper::map($data,'id','nama'))->label('Seminar yang tersedia') ?>

    <div class="form-group">
        <?= Html::submitButton('SUBMIT', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
