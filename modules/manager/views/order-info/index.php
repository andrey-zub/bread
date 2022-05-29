<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manager\models\OrderInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Infos';

$this->params['breadcrumbs'][] = array(
    'label'=> 'manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'order_id',
            [
              'attribute'=>'owner_id',
              'value'=>'owner.name',
            ],
            [
              'attribute'=>'product_id',
              'value'=>'product.product_name',
            ],
            [
              'attribute'=>'baker_id',
              'value'=>'employee.fio',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
