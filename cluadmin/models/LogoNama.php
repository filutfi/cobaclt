<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_logo_nama".
 *
 * @property integer $id
 * @property string $gambar
 * @property string $nama
 */
class LogoNama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_logo_nama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gambar', 'nama'], 'string', 'max' => 45],
			[['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, png']
        ];
    }
	public $image;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gambar' => 'Gambar',
            'nama' => 'Nama',
        ];
    }
}
