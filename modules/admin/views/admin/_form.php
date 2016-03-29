<?php

use yii\helpers\Html,
    yii\widgets\ActiveForm;

?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'username')->textInput() ?>

    <?php echo $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput() ?>

    <?php echo $form->field($model, 'phone_number') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
