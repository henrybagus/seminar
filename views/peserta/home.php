<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use nex\chosen\Chosen;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss(".listsemninar{
//	border-right: 1px #333 dashed;
	padding: 10px 10px 10px 20px;
	margin-bottom: 20px;
}");
$this->registerCss("input[type=checkbox]{
	background: #0000;
	display:inline-block;
	padding: 0 0 0 0px;
	border: 3px solid black;
}

label{
	font-weight: normal;
}

");
?>

		<div class="col-lg-12" align="center">
			<div class="listsemninar">
				<?php
					$list_event=[];
					$i=1;
					foreach($model_event as $event){
						if ($event->status == 1) {
							$list_event[$event->id] = "<span class='event-detail'><b>{$event->nama}</b><br>{$event->deskripsi}<br><small>{$event->jadwal}</small><br>
							<img src={$event->img} style='width:304px;height:228px;'></span>";
							echo $list_event[$i]."<br><br><br>";
							$i++;
						}

					}
				?>
			</div>
		</div>
