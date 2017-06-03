<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogoNama */

$this->title = 'Update Logo Nama: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logo Namas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logo-nama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
