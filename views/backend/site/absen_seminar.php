<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1> Absensi Kehadiran Seminar </h1>

<p> Seminar : </p>


<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_event')->dropDownList(['1' => 'Seminar A', '2' => 'Seminar B']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>