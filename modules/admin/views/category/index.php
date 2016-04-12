<?php

use yii\helpers\Html,
    yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index" style="width:600px; align-content: center;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute'      => 'show',
                'format'         => 'html',
                'contentOptions' => ['style'=>'width: 150px', 'align' => 'center'],
                'value'          => function ($data) {
                    if ($data['show']) {
                        return Html::img('/img_upload/yes.png',
                            ['width' => '60px']);
                    }
                    return Html::img('/img_upload/not.png',
                        ['width' => '60px']);

                },
            ],

            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style'=>'max-width: 20px', 'align' => 'center'],],
        ],
    ]);
    ?>

</div>
