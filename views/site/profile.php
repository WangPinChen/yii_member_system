<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-profile">
    <h1>Profile Page</h1>
    <?php $form = ActiveForm::begin();?>

    <!-- <?php
        echo $user->birthdate;
    ?> -->

    <?= $form->field($model,'username')->textInput(['value'=>$user->username ,'readonly' => true ]);?>
    <?= $form->field($model,'email')->textInput(['value'=>$user->email,'readonly' => true]);?>
    <?= $form->field($model,'phone')->textInput(['value'=>$user->phone , 'type'=>'tel','readonly' => true])?>
    <?= $form->field($model , 'birthdate')->textInput(['value'=>date("Y-m-d", strtotime($user->birthdate)) , 'type'=>'date','readonly' => true])?>
    
    <div class='d-flex'>
        <div class="form-group me-2 edit-btn">
            <?= Html::submitButton('Edit', ['class' => 'btn btn-outline-primary']) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= Html::a('Change Password',['password'])?>


    <?php ActiveForm::end()?>
</div>
<script>
    const editBtn = document.querySelector('.edit-btn') 
    const inputs = document.querySelectorAll('input')
    
    editBtn.addEventListener('click',(e)=>{
        e.preventDefault()
        if(e.target.textContent==='Edit'){
            inputs.forEach(input=>{
                input.removeAttribute('readonly')
            })
            e.target.textContent = 'Cancel'
        }else if(e.target.textContent==='Cancel'){
            inputs.forEach(input=>{
                input.setAttribute('readonly','')
            })
            e.target.textContent = 'Edit'
        }
    })
</script>