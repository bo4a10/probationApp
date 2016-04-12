<?php

use yii\helpers\Html,
    yii\helpers\ArrayHelper,
    kartik\detail\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['productmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo DetailView::widget([
        'model' => $model,
        'condensed'  => true,
        'hover'      => true,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'price',
                'value' => call_user_func (function () use ($model) {
                    return round($model->price, $model::DECIMAL_PLACES);
                })
            ],
            [
                'attribute' => 'discount',
                'value'     => call_user_func (function() use ($model) {

                    return $model->discount . ' %';
                })
            ],
            [
                'attribute' => 'category',
                'value'     => call_user_func(function() use ($model) {
                    return  implode(', ', ArrayHelper::map($model->categories, 'id', 'name'));
                })
            ],
            'short_description',
            'description',
            [
                'attribute' => 'show',
                'value'     => !empty($model->show) ? 'yes' : 'no',
            ],
            [
                'attribute' => 'productphoto',
                'value'     => '/product_img_upload/' . $model-> productphoto,
                'format'    => ['image',['width'=> $model::ONEHUNDRED,'height'=> $model::ONEHUNDRED]],
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