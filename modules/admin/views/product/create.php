<?php

use yii\helpers\Html;

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['productmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
