<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'hp') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'universitas') ?>

    <?php // echo $form->field($model, 'jurusan') ?>

    <?php // echo $form->field($model, 'npm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
