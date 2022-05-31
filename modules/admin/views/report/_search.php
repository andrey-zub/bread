<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manager\models\ReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'owner_name') ?>

    <?= $form->field($model, 'owner_email') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'pay_sum') ?>

    <?php // echo $form->field($model, 'pay_id') ?>

    <?php // echo $form->field($model, 'manager_ID') ?>

    <?php // echo $form->field($model, 'boss_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
