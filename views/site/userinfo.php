<?php

use kartik\detail\DetailView;

echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'User ' . $model->username,
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        'email',
        'phone_number',
        [
            'attribute'=>'photo',
            'value'=> '/img_upload/' . $model-> photo,
            'format' => ['image',['width'=>'100','height'=>'100']],
        ],

    ],

]);

