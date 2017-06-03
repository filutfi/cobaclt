<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        // 'options' => ['class' => 'form-horizontal'],
        // 'fieldConfig' => [
        //     'template' => "<div class='col-lg-3'>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
        // ],
    ]); ?>

        <?= $form->field($model, 'username',['options'=>[
          'tag'=>'div',
          'class'=>'form-group has-feedback required']])->textInput(['autofocus' => true,'placeholder'=>'user name']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>

        <div class="form-group">
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
    </div>
</div>
