<?php

use yii\helpers\Html,
    yii\widgets\ActiveForm,
    kartik\file\FileInput;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

    echo $form->field($model, 'title')->textInput();
    echo $form->field($model, 'price')->textInput();
    echo $form->field($model, 'discount')->textInput();
    echo $form->field($model, 'category')->dropDownList([
        'food' => 'food',
        'clothes' => 'clothes',
        'household chemicals' => 'household chemicals'
    ], [
        'prompt' => 'choose category...',
    ]);
    echo $form->field($model, 'short_description')->textInput();
    echo $form->field($model, 'description')->textArea();
    echo $form->field($model, 'photo')-> widget(FileInput::classname(), [
        'options'       => ['accept'=>'image/*'],
        'pluginOptions' => [
            'showUpload'            => false,
            'previewFileType'       => 'any',
            'allowedFileExtensions' => ['jpg','gif','png'],
        ]
    ]);
    echo $form->field($model, 'show')->checkbox([],false);
    ?>

    <div class="form-group">
<!--        --><?php //echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php echo Html::submitButton('Create', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>