<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'hp',
            'email:email',
            'universitas',
            'jurusan',
            'npm',
        ],
    ]) ?>

    <h2>Seminar yang Diikuti</h2>
    <ul>
        <?php
        foreach($model->eventsData as $event){
            echo "<li><span class='event-detail'><b>{$event->nama}</b><br>{$event->deskripsi}<br><small>{$event->jadwal}</small></span><br><br></li>";
        }
        ?>
    </ul>
</div>
