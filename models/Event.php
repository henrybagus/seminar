<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $nama
 * @property string $jadwal
 * @property string $deskripsi
 *
 * @property Absensi[] $absensis
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'jadwal', 'deskripsi', 'status'], 'required'],
            [['jadwal'], 'safe'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['status'], 'integer'],
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
            'jadwal' => 'Jadwal',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(Absensi::className(), ['id_event' => 'id'])->join('inner join', 'peserta', 'id_peserta = peserta.id')->orderBy('peserta.nama');
    }
}
