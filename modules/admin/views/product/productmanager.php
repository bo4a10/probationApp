<?php

use yii\helpers\Html,
    yii\grid\GridView;

$this->title = 'Product manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productmanager">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p><?php echo Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'attribute' => 'price',
                'value' => function ($data) {
                    return round($data->price, $data::DECIMAL_PLACES);
                }
            ],
            [
                'attribute' => 'discount',
                'value' => function ($data) {
                    return $data->discount . ' %';
                }
            ],
            [
                'attribute' => 'category',
                'filter' => [
                    'food' => 'food',
                    'clothes' => 'clothes',
                    'household chemicals' => 'household chemicals'
                ]
            ],
            'short_description',
            [
                'attribute' => 'show',
                'format' => 'html',
                'value' => function ($data) {
                    if ($data['show']) {
                        return Html::img('/img_upload/yes.png',
                        ['width' => '60px']);
                    } else {
                        return Html::img('/img_upload/not.png',
                        ['width' => '60px']);
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

