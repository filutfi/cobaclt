<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Katagori */

$this->title = 'Update Katagori: ' . ' ' . $model->id_kat;
$this->params['breadcrumbs'][] = ['label' => 'Katagoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kat, 'url' => ['view', 'id' => $model->id_kat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="katagori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
