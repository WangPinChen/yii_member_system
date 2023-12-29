<?php
namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin();?>
    <div class='w-50 mx-auto'>
        <?= $form->field($model,'oldPassword')->passwordInput()?>
        <?= $form->field($model,'newPassword')->passwordInput()?>
        <?= $form->field($model,'confirmPassword')->passwordInput()?>
        <div class="form-group">
            <?= Html::submitButton('Change', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
        
<?php ActiveForm::end()?>