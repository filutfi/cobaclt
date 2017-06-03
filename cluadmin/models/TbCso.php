<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_cso".
 *
 * @property integer $id
 * @property string $nomer
 * @property string $gambar
 */
class TbCso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_cso';
    }
	public $image;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomer', 'gambar'], 'string', 'max' => 45],
			[['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomer' => 'Nomer',
            'gambar' => 'Gambar',
        ];
    }
}
