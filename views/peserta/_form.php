<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use nex\chosen\Chosen;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss(".listsemninar{
	border-right: 1px #333 dashed;
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
$js = <<<JS
	$("#npm").parent().hide();

	$("#universitas").on("change", function(){
		if($(this).val() == "Universitas Katolik Parahyangan / UNPAR"){
			$("#npm").parent().show();
		}else{
			$("#npm").parent().hide();
		}
	});
JS;

$this->registerJs($js);
?>

<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="form col-lg-4">
			<?= Html::img('http://unpar.ac.id/wp-content/uploads/2015/11/Logo-Website-Unpar.png');?>

	
			<div style="text-align:center">
				<h3>Lokasi Kegiatan: </h3>
				<p>
					<b>Operation Room (Ruang 0401)</b><br>
					Gedung Rektorat Lantai 4<br>
					Universitas Katolik Parahyangan <br>
					Jl. Ciumbuleuit No. 94 <br>
					Bandung - 40141 <br>
					
				</p>

				<h3>Kontak: </h3>
				<p>
					cdc@unpar.ac.id<br>
					+62-22-2032655 <br>
					ext. 100120 / 100445 <br>
				</p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="listsemninar">
				<?php
					$list_event=[];
					foreach($model_event as $event){
						if ($event->status == 1) {

							$list_event[$event->id] = "<span class='event-detail'><b>{$event->nama}</b><br>{$event->deskripsi}<br><small>{$event->jadwal}</small></span>";
						}

					}

					echo $form->field($model, 'events')->checkboxList($list_event,[
						'separator'=>'</br></br>',
						'encode' => false,
					])->label('<h3>Pilih Perusahaan</h3>');
				?>
			</div>
		</div>
		<div class="form col-lg-4">
			<h3>Data Diri</h3>

			<?php
			if(Yii::$app->session->hasFlash('success')){
				echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
			}
			?>

			<?= $form->field($model, 'nama')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'hp')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'email')->input('email') ?>

			<?= $form->field($model, 'universitas')->widget(Chosen::className(), [
				"items" => Yii::$app->params['universitas'],
				"options" => [
					"id" => "universitas",
				],
			]); ?>

			<?= $form->field($model, 'jurusan')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'npm')->textInput(['maxlength' => 255, 'id' => 'npm']) ?>

		</div>
	</div>
	<div class="row">
		<div class="col-lg-offset-4 col-lg-8">
			<?= Html::submitButton($model->isNewRecord ? 'Daftar' : 'Update', ['class' => $model->isNewRecord ? 'btn 	btn-success btn-block' : 'btn btn-primary btn-block']) ?>
			<br><br>
		</div>
	</div>
<?php ActiveForm::end(); ?>
