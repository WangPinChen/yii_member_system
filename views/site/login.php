<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin()?>
<?= $form->field($model,'email')->textInput(['autofocus'=>true])?>
<?= $form->field($model,'password')->passwordInput()?>

<div class='form-group'>
    <?= Html::submitButton('Sign in',['class'=>'btn btn-primary'])?>
</div>

<?php ActiveForm::end() ?>