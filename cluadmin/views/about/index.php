<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="display:none">
        <?= Html::a('Create About', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			[
				'attribute'=>'desc',
				'label' => 'Description'
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template'=>'{update}'
			],
        ],
    ]); ?>

</div>
