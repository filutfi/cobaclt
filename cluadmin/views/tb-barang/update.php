<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbBarang */

$this->title = 'Update Tb Barang: ' . ' ' . $model->id_brg;
$this->params['breadcrumbs'][] = ['label' => 'Tb Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_brg, 'url' => ['view', 'id' => $model->id_brg]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
