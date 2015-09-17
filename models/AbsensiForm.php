<?php

namespace app\models;

use yii\base\Model;

class AbsensiForm extends Model {
	public $id;
	public $id_event;
	public $id_peserta;
	public $kehadiran;

	public function rules() {
		return 
			[
				[['id','id_event','id_peserta','kehadiran'], 'safe'],
			];
	}
}
?>