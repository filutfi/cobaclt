<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_katagori".
 *
 * @property integer $id_kat
 * @property string $nama_kat
 * @property string $ket
 * @property integer $status
 */
class TbKatagori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_katagori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['nama_kat'], 'string', 'max' => 100],
            [['ket'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kat' => 'Id Kat',
            'nama_kat' => 'Nama Kat',
            'ket' => 'Ket',
            'status' => 'Status',
        ];
    }
}
