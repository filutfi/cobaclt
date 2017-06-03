<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wp_users".
 *
 * @property string $ID
 * @property string $user_login
 * @property string $user_pass
 * @property string $user_registered
 * @property integer $user_status
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wp_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_registered'], 'safe'],
            [['user_status'], 'integer'],
            [['user_login'], 'string', 'max' => 60],
            [['user_pass'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'user_login' => 'User Name',
            'user_pass' => 'Password',
            'user_registered' => 'User Registered',
            'user_status' => 'User Status',
        ];
    }
}
