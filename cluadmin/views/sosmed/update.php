<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbSosmed */

$this->title = 'Update Tb Sosmed: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Sosmeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-sosmed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
