<?php

use yii\helpers\Html,
    kartik\detail\DetailView;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['usersmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo DetailView::widget([
        'model' => $model,
        'condensed'  => true,
        'hover'      => true,
        'attributes' => [
            'id',
            'username',
            'phone_number',
            'email:email',
            [
                'attribute' => 'photo',
                'value'     => '/user_img_upload/' . $model-> photo,
                'format'    => ['image',['width'=> $onehundred,'height'=> $onehundred]],
            ],
        ],
    ]) ?>

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>
