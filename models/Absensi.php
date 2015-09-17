<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property integer $id
 * @property integer $id_peserta
 * @property integer $id_event
 * @property integer $kehadiran
 *
 * @property Peserta $idPeserta
 * @property Event $idEvent
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_peserta', 'id_event', 'kehadiran'], 'required'],
            [['id_peserta', 'id_event', 'kehadiran'], 'integer'],
            [['id_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_peserta' => 'id']],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['id_event' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_peserta' => 'Id Peserta',
            'id_event' => 'Id Event',
            'kehadiran' => 'Kehadiran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'id_event']);
    }
}
