<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_sosmed".
 *
 * @property integer $id
 * @property string $link
 * @property string $gambar
 */
class TbSosmed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_sosmed';
    }
public $image;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'gambar'], 'string', 'max' => 45],
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
            'link' => 'Link',
            'gambar' => 'Gambar',
        ];
    }
}
