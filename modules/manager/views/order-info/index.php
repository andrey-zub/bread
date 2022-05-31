<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Infos';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-info-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            [
              'attribute'=>'product_id',
              'value'=>'product.product_name',
            ],

            [
              'attribute'=>'owner_id',
              'value'=>'owner.name',
            ],
            [
              'attribute'=>'baker_id',
              'value'=>'employee.fio',
            ],
          
            'order_status',

            ['class' => 'yii\grid\ActionColumn',
            'template'=> '{update} {view}',
          ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
