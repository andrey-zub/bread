<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TechCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tech Cards';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tech-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'product_id',
            'technolog_id',
            'recipe:ntext',

            ['class' => 'yii\grid\ActionColumn',
          'template' => '{view} {update}]',
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
