<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manager\models\OwnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Owners';
$this->params['breadcrumbs'][] = array(
    'label'=> 'manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Owner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'id',
            'name',
            'phone',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
