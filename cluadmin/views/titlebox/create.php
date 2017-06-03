<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Titlebox */

$this->title = 'Create Titlebox';
$this->params['breadcrumbs'][] = ['label' => 'Titleboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titlebox-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
