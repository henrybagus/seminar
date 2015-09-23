<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */

$this->title = $model->nama;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
			'hp',
			'email',
			'universitas',
			'jurusan', 
			'npm',
			],
		]);
	?>
	<?php
		echo "<h3><b>Anda terdaftar di seminar-seminar berikut: </b></h3><ol>";
		foreach($model->eventsData as $row){
			echo"<li>";
			echo $row->nama."</li></br>";
		}
	?>
	</ol></br>
    <p>
		Salah data? ingin berubah list seminar? klik button dibawah ini: </br>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>
</div>
