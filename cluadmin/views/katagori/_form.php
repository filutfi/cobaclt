<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Katagori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="katagori-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nama_kat')->textInput(['maxlength' => true]) ?>

    <div class="hilang">
      <?= $form->field($model, 'id_kat')->textInput() ?>
      <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
