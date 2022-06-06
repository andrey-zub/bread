<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manager\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Admin panel',
    'url'=>Yii::$app->urlManager->createUrl(['admin/'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Product menu',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager menu',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'owner_name',
            'owner_email:email',
            'status',
            'pay_sum',
            'pay_id',
            'manager_id',
            'boss_id',

            ['class' => 'yii\grid\ActionColumn',
      
          ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
