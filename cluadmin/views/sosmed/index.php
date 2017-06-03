<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Sosmeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-sosmed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Sosmed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			[
				'attribute' => 'gambar',
				'format' => 'html',
				'contentOptions' => ['width' => '10%'],
             	'label' => 'icon',
				'value' => function ($data) {
					return Html::img(Yii::$app->request->baseUrl.'/uploads/' . $data['gambar'],
						['width' => '50px']);
				},
			],

			[
              'attribute'=>'link',
              'contentOptions' => ['width' => '80%'],
              'format'=>'raw',
              'value' => function ($data) {
                          return Html::a($data->link,$data->link, ['target'=>'_blank']);
                      },
            ],
            //'id',
            //'link',

            [
				'class' => 'yii\grid\ActionColumn',
				'template'=>'{update}{delete}'
			],
        ],
    ]); ?>

</div>
