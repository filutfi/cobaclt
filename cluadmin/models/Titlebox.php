<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_titlebox".
 *
 * @property integer $id
 * @property string $judul
 */
class Titlebox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_titlebox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
        ];
    }
}
