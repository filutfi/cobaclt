<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_barang".
 *
 * @property string $id_brg
 * @property string $nama_brg
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property string $deskripsi_singkat
 * @property string $deskripsi
 * @property integer $sts
 * @property string $gambar
 * @property string $id_katagori
 * @property string $id_goal
 * @property string $id_brand
 * @property integer $jumlah_like
 * @property integer $nilai
 * @property integer $jumlah_pemberi_bintang
 * @property string $tgl_input
 */
class TbBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_brg'], 'required'],
            [['harga_beli', 'harga_jual', 'sts', 'jumlah_like', 'nilai', 'jumlah_pemberi_bintang'], 'integer'],
            [['deskripsi'], 'string'],
            [['tgl_input'], 'safe'],
            [['id_brg', 'id_katagori', 'id_goal', 'id_brand'], 'string', 'max' => 10],
            [['nama_brg', 'gambar'], 'string', 'max' => 45],
            [['deskripsi_singkat'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_brg' => 'Id Barg',
            'nama_brg' => 'Nama Barang',
            'harga_beli' => 'Harga Beli',
            'harga_jual' => 'Harga Jual',
            'deskripsi_singkat' => 'Deskripsi Singkat',
            'deskripsi' => 'Deskripsi',
            'sts' => 'Sts',
            'gambar' => 'Gambar',
            'id_katagori' => 'Id Katagori',
            'id_goal' => 'Id Goal',
            'id_brand' => 'Id Brand',
            'jumlah_like' => 'Jumlah Like',
            'nilai' => 'Nilai',
            'jumlah_pemberi_bintang' => 'Jumlah Pemberi Bintang',
            'tgl_input' => 'Tgl Input',
        ];
    }
}
