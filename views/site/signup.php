<?php

use yii\helpers\Html,
 yii\bootstrap\ActiveForm,
 kartik\file\FileInput;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-signup">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">

        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options'=>['enctype'=>'multipart/form-data']]); ?>
            <?php echo $form-> field($model, 'username'); ?>
            <?php echo $form-> field($model, 'password')->passwordInput(); ?>
            <?php echo $form-> field($model, 'email'); ?>
            <?php echo $form-> field($model, 'phone_number'); ?>
            <?php echo $form-> field($model, 'photo')-> widget(FileInput::classname(), [
                'options'       => ['accept'=>'image/*'],
                'pluginOptions' => [
                    'showUpload'            => false,
                    'previewFileType'       => 'any',
                    'allowedFileExtensions' =>['jpg','gif','png']
                ]
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
