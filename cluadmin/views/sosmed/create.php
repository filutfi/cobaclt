<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbSosmed */

$this->title = 'Create Tb Sosmed';
$this->params['breadcrumbs'][] = ['label' => 'Tb Sosmeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-sosmed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
