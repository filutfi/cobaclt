<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Post';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">
    <h2><?= Html::encode($this->title) ?></h2>
    <p>
        <?= Html::a('Tambah Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'post_title',
              'contentOptions' => ['width' => '60%'],
              'format'=>'raw',
              'value' => function ($data) {
                          return Html::a($data->post_title,['posts/update','id' => $data->ID]);
                      },
            ],
            'user_login',
            'nama_kat',
            [
              'attribute'=>'post_date',
              'format'=>['date','d MMM Y'],
            ],
            [
            'label' => 'Publish',
            'attribute' => 'post_status',
            'value' => function ($model) {
                if($model->post_status==1){
                  return "Published";
                }else{
                  return "Off";
                }
            }],
            // [
            //   'attribute'=>'post_status',
            //   'format'=>'raw',
            //   'value' => function ($data) {
            //               //return Html::a($data->post_status,['posts/update','id' => $data->ID]);
            //               return Html::a('publish',['posts/ubahsts']);
            //           },
            // ],
            //'post_date',
            //'ID',
            //'post_content:ntext',
            // 'post_status',
            // 'comment_status',
            // 'post_name',
            // 'post_modified',
            // 'guid',
            // 'comment_count',

           
        ],
    ]); ?>
</div>
