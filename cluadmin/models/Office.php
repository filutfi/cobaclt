<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_office".
 *
 * @property integer $id
 * @property string $alamat
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alamat' => 'Alamat',
        ];
    }
}
