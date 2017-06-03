<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Barangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-barang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Condensed Full Width Table</h3>
        </div><!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'class'=>'table table-condensed',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute' => 'nama_brg',
            'contentOptions' => ['class' => 'text-center'],
            'headerOptions' => ['class' => 'text-center']
            ],
            [
            'attribute' => 'harga_jual',
            'format'=> ['decimal',2],
            ],

            'nama_brg',
            'harga_beli',
            'deskripsi_singkat',
            // 'deskripsi:ntext',
            // 'sts',
            // 'gambar',
            // 'id_katagori',
            // 'id_goal',
            // 'id_brand',
            // 'jumlah_like',
            // 'nilai',
            // 'jumlah_pemberi_bintang',
            // 'tgl_input',

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
</div>
    <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Condensed Full Width Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-condensed">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>Task</th>
                          <th>Progress</th>
                          <th style="width: 40px">Label</th>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Update software</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-red">55%</span></td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Clean database</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-yellow">70%</span></td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>Cron job running</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-light-blue">30%</span></td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>Fix and squish bugs</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-green">90%</span></td>
                        </tr>
                      </tbody></table>
                    </div><!-- /.box-body -->
                  </div>
</div>
