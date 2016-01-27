<?php

namespace app\models;

use Yii;
use app\models\Absensi;

/**
 * This is the model class for table "peserta".
 *
 * @property integer $id
 * @property string $nama
 * @property string $hp
 * @property string $email
 * @property string $universitas
 * @property string $jurusan
 * @property string $npm
 *
 * @property Absensi[] $absensis
 */
class Peserta extends \yii\db\ActiveRecord
{
	public $events=[];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'hp', 'email', 'universitas', 'jurusan','events'], 'required'],
            [['nama', 'jurusan'], 'string', 'max' => 50],
            [['hp'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 30],
            [['universitas'], 'string', 'max' => 150],
            [['npm'], 'string', 'max' => 11],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'hp' => 'Handphone',
            'email' => 'Email',
            'universitas' => 'Universitas',
            'jurusan' => 'Jurusan',
            'npm' => 'NPM',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(Absensi::className(), ['id_peserta' => 'id']);
    }

	public function getEventsData(){
		return $this->hasMany(Event::className(),['id'=>'id_event'])->via('absensis');
	}

	public function afterSave($insert,$changedAttributes){
		$absensi=Absensi::deleteAll(['id_peserta'=>$this->id]);
		foreach($this->events as $id_event){
			$absensi=new Absensi;
			$absensi->id_peserta=$this->id;
			$absensi->id_event=$id_event;
			$absensi->kehadiran=0;
			$absensi->save();
		}
	}
	public function afterFind(){
		$this->events=$this->eventsData;
	}
}
