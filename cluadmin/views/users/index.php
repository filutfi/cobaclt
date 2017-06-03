<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create user', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //'ID',
            [
              'label'=>'user name',
              'attribute'=>'user_login',
              'contentOptions' => ['width' => '75%'],
            ],
            [
              'attribute'=>'user_registered',
              'format'=>['date','d MMM Y'],
            ],
            // 'user_pass',
            // 'user_status',

            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{update}',
            ],
        ],
    ]); ?>

</div>
