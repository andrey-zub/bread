<?  use yii\helpers\Url;

$this->title = 'Check-fail';
$this->params['breadcrumbs'][] = array(
    'label'=> 'check-fail',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);
?>

<div class="col-lg-12 ">
    <div>
        <h1>Статус заказа:</h1>
        <h3>Оплата отменена!</h3>
    </div>
</div>
<div class="col-lg-12">
    <h1>---------------------------------------------------------</h1>

      <h3> Заказ отменен </h3>
      <a href="<?php echo Url::toRoute('page/product');?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки</a>
</div>
