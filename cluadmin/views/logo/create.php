<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogoNama */

$this->title = 'Create Logo Nama';
$this->params['breadcrumbs'][] = ['label' => 'Logo Namas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-nama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
