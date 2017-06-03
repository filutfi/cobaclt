<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atur logo dan nama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-nama-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            
            //'gambar',
            //'nama',
			[
				'attribute' => 'gambar',
				'format' => 'html',
				'contentOptions' => ['width' => '10%'],
             	'label' => 'Logo',
				'value' => function ($data) {
					return Html::img(Yii::$app->request->baseUrl.'/uploads/' . $data['gambar'],
						['width' => '50px']);
				},
			],
            'nama',
			
			[
				'class' => 'yii\grid\ActionColumn',
				'template'=>'{update}'
			],

        ],
    ]); ?>

</div>
