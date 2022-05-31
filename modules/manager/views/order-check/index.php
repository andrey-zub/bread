<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderCheckSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Checks';

$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-check-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'owner_id',
            'manager_id',
            'date_init',
            'finish',
            //'name',
            //'phone',
            //'email:email',
            //'billid',
            //'amount',

            ['class' => 'yii\grid\ActionColumn',
          'template' => '{view} ',
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
