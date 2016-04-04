<?php

use yii\helpers\Html;

$this->title = 'Update Product: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['productmanager']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
