<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-barang-form col-md-12">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
      <?= $form->field($model, 'id_brg')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nama_brg')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'harga_beli')->textInput() ?>

      <?= $form->field($model, 'harga_jual')->textInput() ?>

      <?= $form->field($model, 'deskripsi_singkat')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'sts')->textInput() ?>
    </div>
    <div class="col-md-6">
      <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'id_katagori')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'id_goal')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'id_brand')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'jumlah_like')->textInput() ?>

      <?= $form->field($model, 'nilai')->textInput() ?>

      <?= $form->field($model, 'jumlah_pemberi_bintang')->textInput() ?>

      <?= $form->field($model, 'tgl_input')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
