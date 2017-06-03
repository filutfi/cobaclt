<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\TbCso */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.fileinput-upload-button,.fileinput-remove-button{
  display: none !important;
}
</style>

<div class="tb-cso-form">

   
    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>
	<div class="col-md-6">
      <div class="box">
        <div class="box-body">
          <div class="col-md-12">
				<?= $form->field($model, 'nomer')->textInput(['maxlength' => true]) ?>
				
				<?php
              if($model->gambar!=""){
                echo "<label>Image saat ini
                        <img src='".Yii::$app->request->baseUrl.'/uploads/'.$model->gambar."' class='img-responsive'/>
                      </label>";
              }
              // your fileinput widget for single file upload
              echo $form->field($model, 'image')->widget(FileInput::classname(), [
                'options'=>['accept'=>'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','png']
                ]]);
                ?>
							
				
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
			
          </div>
        </div><!-- /.box-body -->
      </div>
	</div>
	<div style="display:none">
	<?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>
	</div>

	
	
    <?php ActiveForm::end(); ?>


</div>
