<?php

use yii\helpers\Html;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['usersmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
