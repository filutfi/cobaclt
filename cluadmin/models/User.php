<?php

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Users as DbUser;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    public static function tableName() { return 'wp_users'; }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $user = self::find()
            ->where([
                "ID" => $id
            ])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //   $dbUser = DbUser::find()
        //      ->where([
        //          "ID" => $token
        //      ])
        //      ->one();
        //  if (!count($dbUser)) {
        //      return null;
        //  }
        //  return new static($dbUser);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = self::find()
        ->where([
            "user_login" => $username
        ])
        ->one();
        if (!count($user)) {
          return null;
        }
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->user_registered;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->user_registered === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_pass === md5($password);
    }
}
