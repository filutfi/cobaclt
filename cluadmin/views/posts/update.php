<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Update Post ';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-update container">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
