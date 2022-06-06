<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Product menu';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Product menu',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);

?>
<div class="product-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          [
            'class' => 'yii\grid\ActionColumn',
            'template' => ' {cart}',
            'buttons' => [
                'cart' => function ($url,$model,$key) {
                    return  Html::a('<span class="glyphicon glyphicon-shopping-cart" ></span>', $url);
                },
            ],
        ],

            'product_name',
            'price',
            'counts',
      ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
