<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style='display:none'>
        <?= Html::a('Create Office', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			[
				'attribute'=>'alamat',
				'label' => 'description'
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template'=>'{update}'
			],
        ],
    ]); ?>

</div>
