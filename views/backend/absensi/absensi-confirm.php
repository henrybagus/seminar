<?php

use yii\helpers\Html;

?>
<center>
<h1> Absensi Kehadiran Seminar </h1>
<h1> Seminar : <?= Html::encode($event->nama) ?> </h1> 
</center>

<?= Html::a('Back', ['absensi/entry'], ['class' => 'btn btn-success']) ?>
</br>
</br>
<table class="table">
	<tr> 
		<td> No </td>
		<td> Nama </td>
		<td> Universitas </td>
		<td> Status Kehadiran </td>
	</tr>
	<?php
		$count = 0;
		foreach($event->absensis as $key => $value) {
			// $key1 = $value->kehadiran = 1;
			if ($value->kehadiran == 0) {
	?>
				<tr>
					<td> <?= $count=$count+1 ?></td>
					<td> <?= $value->idPeserta->nama ?> </td>
					<td> <?= $value->idPeserta->universitas ?> </td>
					<td> <?= Html::a('Hadir', ['absensi/refresh','id'=>$value->id], ['class' => 'btn btn-success']) ?> </td>
				</tr>
	<?php
			} else {
	?>
				<tr>
					<td> <?= $count=$count+1 ?></td>
					<td> <?= $value->idPeserta->nama ?> </td>
					<td> <?= $value->idPeserta->universitas ?> </td>
					<td> <?= Html::a('Hadir', ['absensi/refresh','id'=>$value->id], ['class' => 'btn btn-danger']) ?> </td>
				</tr>
	<?php
			}
		}
	?>
</table>


