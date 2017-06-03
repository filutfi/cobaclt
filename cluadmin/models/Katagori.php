<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_katagori".
 *
 * @property string $id_kat
 * @property string $nama_kat
 * @property string $ket
 */
class Katagori extends \yii\db\ActiveRecord
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
            [['id_kat'], 'string', 'max' => 10],
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
        ];
    }
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['id_kat' => 'id_kat']);
    }
}
