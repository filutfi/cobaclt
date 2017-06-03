<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbBarang */

$this->title = $model->id_brg;
$this->params['breadcrumbs'][] = ['label' => 'Tb Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_brg], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_brg], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_brg',
            'nama_brg',
            'harga_beli',
            'harga_jual',
            'deskripsi_singkat',
            'deskripsi:ntext',
            'sts',
            'gambar',
            'id_katagori',
            'id_goal',
            'id_brand',
            'jumlah_like',
            'nilai',
            'jumlah_pemberi_bintang',
            'tgl_input',
        ],
    ]) ?>

</div>
