<?php

use yii\helpers\Html,
    yii\grid\GridView;

$this->title = 'Users manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersmanager">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email',
            'phone_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

