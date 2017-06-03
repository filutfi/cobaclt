<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_login')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_pass')->passwordInput()?>

    <div class="hilang">
      <?= $form->field($model, 'user_status')->textInput(['value'=>1]) ?>
      <?php
      if($model->user_registered){
        echo $form->field($model, 'user_registered')->textInput();
      }else{
        echo $form->field($model, 'user_registered')->textInput(['value'=>date("y-m-d H:i:s")]);
      }
      ?>
    </div>

    <?php
     if($model->isNewRecord){ ?>
      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    <?php }else if($model->user_login==Yii::$app->user->identity->user_login){ ?>
      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    <?php }
     ActiveForm::end(); ?>

</div>
