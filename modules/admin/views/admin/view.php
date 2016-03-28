<?php

use yii\helpers\Html,
    kartik\detail\DetailView;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['usersmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
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
                'value'     => '/img_upload/' . $model-> photo,
                'format'    => ['image',['width'=>'100','height'=>'100']],
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>
