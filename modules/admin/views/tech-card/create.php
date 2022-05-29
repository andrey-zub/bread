<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechCard */

$this->title = 'Create Tech Card';
$this->params['breadcrumbs'][] = ['label' => 'Tech Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tech-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
