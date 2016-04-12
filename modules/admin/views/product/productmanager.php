<?php

use yii\helpers\Html,
    app\modules\admin\models\Category,
    app\modules\admin\models\Product,
    yii\helpers\ArrayHelper,
    yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
                'filter' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Product $product) {
                    return implode(', ', ArrayHelper::map($product->categories, 'id', 'name'));
                }

            ],
            'short_description',
            [
                'attribute' => 'show',
                'format' => 'html',
                'value' => function (Product $product) {
                    if ($product['show']) {
                        return Html::img('/img_upload/yes.png',
                        ['width' => '60px']);
                    }
                        return Html::img('/img_upload/not.png',
                        ['width' => '60px']);

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

