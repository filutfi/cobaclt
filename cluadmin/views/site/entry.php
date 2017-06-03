<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Nama mu') ?>

    <?= $form->field($model, 'email')->label('Email mu') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-warning']) ?>
    </div>

<?php ActiveForm::end(); ?>
