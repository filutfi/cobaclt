<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Katagori */

$this->title = 'Create Katagori';
$this->params['breadcrumbs'][] = ['label' => 'Katagoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katagori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
