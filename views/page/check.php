<?  use yii\helpers\Url;

$this->title = 'Check-succes';
$this->params['breadcrumbs'][] = array(
    'label'=> 'check',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);
?>


<div class="col-lg-12 ">
    <div>
        <h1>Статус заказа:</h1>
        <h3>Оплата прошла успешно!</h3>
    </div>
</div>
<div class="col-lg-12">
    <h1>---------------------------------------------------------</h1>

      <h3> Заказ оформлен! </h3>
      <a href="<?php echo Url::toRoute('page/product');?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки</a>
</div>
