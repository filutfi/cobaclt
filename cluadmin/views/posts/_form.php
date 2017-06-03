<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use app\models\Katagori;
use app\models\Titlebox;
use kartik\file\FileInput;
use yii\widgets\Pjax;

//use dosamigos\ckeditor\CKEditorInline;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.fileinput-upload-button,.fileinput-remove-button{
  display: none !important;
}
</style>

<div class="posts-form">
    <?php $form = ActiveForm::begin(
    [
    'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>
    <div class="col-md-8">
      <?= $form->field($model, 'post_title')->textInput() ?>
      <?= $form->field($model, 'post_content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart',
        'clientOptions' => [
           'filebrowserUploadUrl' => 'Upload/url'
       ]
        ]) ?>


      <div class="hilang">
        <?php
          if(empty($model->post_author)){
            echo $form->field($model, 'post_author')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->ID]);
          }else{
            echo $form->field($model, 'post_author')->textInput(['maxlength' => true]);
          }

          if($model->post_date){
            echo $form->field($model, 'post_date')->textInput();
          }else{
            echo $form->field($model, 'post_date')->textInput(['value'=>date("y-m-d H:i:s")]);
          }
        ?>
        <?= $form->field($model, 'comment_status')->textInput(['maxlength' => true,'value'=>'close']) ?>
        <?= $form->field($model, 'post_modified')->textInput(['value'=>date("y-m-d")]) ?>
        <?= $form->field($model, 'comment_count')->textInput(['maxlength' => true,'value'=>0]) ?>
        <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'post_status')->textInput(['maxlength' => true,'value'=>1]) ?>

      </div>
    </div>

    <div class="col-md-3">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Set feature image <br/><small>Gunakan image 800x445 untuk hasil terbaik</small></h3>
        </div>
        <div class="box-body">
          <div class="col-md-12">
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
          </div>
        </div><!-- /.box-body -->
      </div>
      <div class="box">
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Katagori</label>
              <?= Html::activeDropDownList($model, 'id_kat',
                    ArrayHelper::map(Katagori::find()->all(), 'id_kat', 'nama_kat'),['class'=>'col-md-12']) ?>
            </div>
            <div class="form-group">
              <label>Jenis</label>
              <?php
				            echo Html::activeDropDownList($model, 'posisi',
                    ArrayHelper::map(Titlebox::find()->where(['<','id',8])->orderBy('id')->all(), 'id', 'judul'),['class'=>'col-md-12']) ?>

            </div>


            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
              <label>Published </label>
              <a href="javascript:void(0)" onclick="testi()" class="pull-right">

                <img id='imgpublish' src="<?php echo $model->post_status==1?Yii::$app->request->baseUrl."/image/on.png":Yii::$app->request->baseUrl."/image/off.png";?>" width="50px" />
              </a>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div>
      <div class="box box-danger">
        <div class="box-body">
          <div class="col-md-12">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success btn-block btn-flat' : 'btn btn-primary btn-block btn-flat']) ?>
          </div>

        </div><!-- /.box-body -->
      </div>

	  <div class="box box-danger">
        <div class="box-body">

		  <div class="col-md-12">
                <?= Html::a("delete permanently",['posts/hapus','id' => $model->ID],['class'=>'btn btn-danger btn-block btn-flat']); ?>
          </div>
        </div><!-- /.box-body -->
      </div>
  </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function testi(){
      var gbrOn="<?php echo Yii::$app->request->baseUrl."/image/on.png"?>";
      var gbrOff="<?php echo Yii::$app->request->baseUrl."/image/off.png"?>";
      var gbr=document.getElementById('imgpublish').src;
      if(gbr.substr(gbr.length-6)=='on.png'){
        document.getElementById('imgpublish').src=gbrOff;
        $('#posts-post_status').val(0);
      }else{
        document.getElementById('imgpublish').src=gbrOn;
        $('#posts-post_status').val(1);
      }

    }
</script>
