<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div>
    <div class="text-center">
        <h1>Sign Page</h1>
    </div>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model , 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model , 'email')->textInput()?>
        <?= $form->field($model , 'phone')->textInput(['type'=>'tel'])?>
        <?= $form->field($model , 'birthdate')->widget(\yii\jui\DatePicker::className(), [
            'options' => ['class' => 'form-control']
        ])?>
        <?= $form->field($model , 'password')->passwordInput()?>
        <?= $form->field($model , 'password_confirm')->passwordInput()?>
        <button class='btn btn-primary' type='submit'>Signup</button>
    <?php ActiveForm::end(); ?>
</div>