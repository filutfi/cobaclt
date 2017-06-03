<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_allpost".
 *
 * @property string $ID
 * @property string $post_author
 * @property string $post_date
 * @property string $post_content
 * @property string $post_title
 * @property string $post_status
 * @property string $comment_status
 * @property string $post_modified
 * @property string $link
 * @property string $comment_count
 * @property integer $id_kat
 * @property string $gambar
 * @property string $posisi
 * @property string $nama_kat
 * @property integer $status
 * @property string $user_registered
 */
class VAllpost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_allpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'post_author', 'comment_count', 'id_kat', 'status'], 'integer'],
            [['post_date', 'post_modified', 'user_registered'], 'safe'],
            [['post_content', 'post_title', 'id_kat', 'gambar', 'posisi'], 'required'],
            [['post_content', 'post_title'], 'string'],
            [['post_status', 'comment_status'], 'string', 'max' => 20],
            [['link'], 'string', 'max' => 255],
            [['gambar'], 'string', 'max' => 200],
            [['posisi'], 'string', 'max' => 10],
            [['nama_kat'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'post_author' => 'Post Author',
            'post_date' => 'Post Date',
            'post_content' => 'Post Content',
            'post_title' => 'Post Title',
            'post_status' => 'Post Status',
            'comment_status' => 'Comment Status',
            'post_modified' => 'Post Modified',
            'link' => 'Link',
            'comment_count' => 'Comment Count',
            'id_kat' => 'Id Kat',
            'gambar' => 'Gambar',
            'posisi' => 'Posisi',
            'nama_kat' => 'Katagori',
            'status' => 'Status',
            'user_registered' => 'User Registered',
            'user_login' => 'Penulis',
        ];
    }
}
