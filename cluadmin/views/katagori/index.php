<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Katagori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katagori-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Katagori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            //'id_kat',
            [
              'attribute'=>'nama_kat',
              'contentOptions' => ['width' => '95%'],
            ],
            //'ket',
            //'status',
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{update}{delete}',

            ],
        ],
    ]); ?>
    <p style="color:red">
      *NOTE : dilarang menghapus "uncategories" label.
    </p>

</div>
