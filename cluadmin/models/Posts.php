<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wp_posts".
 *
 * @property string $ID
 * @property string $post_author
 * @property string $post_date
 * @property string $post_content
 * @property string $post_title
 * @property string $post_status
 * @property string $comment_status
 * @property string $post_name
 * @property string $post_modified
 * @property string $guid
 * @property string $comment_count
 * @property string $id_kat
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wp_posts';
    }

    /**
     * @inheritdoc
     */
     public $image;
    // Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';
    public function rules()
    {
        return [
            [['post_author', 'comment_count'], 'integer'],
            [['post_date', 'post_modified'], 'safe'],
            [['post_title', 'id_kat'], 'required'],
            [['post_content', 'post_title'], 'string'],
            [['post_status', 'comment_status'], 'string', 'max' => 20],
            [['link'], 'string', 'max' => 255],
            [['id_kat'], 'string', 'max' => 50],
            [['gambar'], 'string', 'max' => 150],
            [['posisi'], 'string'],
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
            'ID' => 'ID',
            'post_author' => 'Penulis',
            'post_date' => 'Tanggal Buat',
            'post_content' => 'Isi',
            'post_title' => 'Judul',
            'post_status' => 'Post Status',
            'comment_status' => 'Comment Status',
            'post_name' => 'Post Name',
            'post_modified' => 'Post Modified',
            'guid' => 'Guid',
            'comment_count' => 'Comment Count',
            'id_kat' => 'Id Kat',
        ];
    }

    public function getKatagori()
    {
        return $this->hasOne(Katagori::className(), ['id_kat' => 'id_kat']);
    }
}
