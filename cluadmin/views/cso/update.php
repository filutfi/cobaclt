<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbCso */

$this->title = 'Update Tb Cso: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Csos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-cso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
