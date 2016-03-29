<?php

use yii\helpers\Html,
    yii\grid\GridView;

$this->title = 'Users manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersmanager">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p><?php echo Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php echo GridView::widget([
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

