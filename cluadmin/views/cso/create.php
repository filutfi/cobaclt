<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCso */

$this->title = 'Create Tb Cso';
$this->params['breadcrumbs'][] = ['label' => 'Tb Csos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
