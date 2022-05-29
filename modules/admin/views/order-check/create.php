<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderCheck */

$this->title = 'Create Order Check';
$this->params['breadcrumbs'][] = ['label' => 'Order Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-check-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
