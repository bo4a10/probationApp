<?php

use yii\helpers\Html,
    yii\widgets\ActiveForm,
    app\modules\admin\models\Category,
    kartik\file\FileInput,
    kartik\select2\Select2;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

    echo $form->field($model, 'title')->textInput();
    echo $form->field($model, 'price')->textInput();
    echo $form->field($model, 'discount')->textInput();

    echo $form->field($model, 'category')->widget(Select2::classname(), [
        'data' => Category::getDropDownArray(),
        'options' => [
            'placeholder' => 'Select categories ...',
            'multiple' => true
        ],
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
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>