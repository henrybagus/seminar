<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PesertaForm extends Model
{
	public $nama;
	public $hp;
	public $email;
	public $universitas;
	public $jurusan;
	public $npm
	
	public function rules()
	{
		return [
			[['nama','universitas','jurusan','hp','npm','email'], 'required'],
			['email','email'],
		];
	}
}

?>