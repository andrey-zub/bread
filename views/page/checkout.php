<?php
    use yii\helpers\Url;

    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'Checkout page';
    $this->params['breadcrumbs'][] = array(
        'label'=> 'checkout',
        'url'=>Yii::$app->urlManager->createUrl(['page/product'])
    );

?>

<? $session = Yii::$app->session;
     $product = $session->get('product');
     $amount = $session->get('amount');
         ?>

<div class="col-lg-12 ">
    <div>
        <h1>Состояние корзины</h1>
        <h3>Ваша корзина содержит: [  <?php echo count($product);?>  ] товара</h3>
    </div>
</div>
<div class="col-lg-12">
    <h1>---------------------------------------------------------</h1>
</div>
<div class="col-lg-12">
    <?php if(count($product) == 0):?>
            <p>В корзине нет товаров</p>
              <a href="<?php echo Url::toRoute('page/product');?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки</a>
        </div>
    <?php else: $sum = 0?>





    <table class="table table-bordered">
        <tr>
            <td></td>
            <td bgcolor="#f6eed3" align="center">Выбранный товар</td>

            <td bgcolor="#D3EDF6" align="center">Стоимость</td>

            <td bgcolor="#8deca6" align="center">-------</td>

        </tr>

        <?php foreach($product as $key => $value):?>
            <tr >
                <td></td>

                <td ><?php echo $product[$key]['product_name'];?></td>


                <td ><?php
                                            $sum += $product[$key]['price'] * $product[$key]['count_cart'];
                                            echo $product[$key]['price'] * $product[$key]['count_cart'];?> руб
                </td>
                <td >-------</td>
            </tr>
        <?php endforeach;?>
        <tr class="cart_prod_footer">
            <td colspan="1" class="null_cart"></td>
            <td colspan="2" class="rez_title_cart">Итого, к оплате:</td>
            <td class="rez_price_cart"><?php echo $amount;?> руб</td>
        </tr>
    </table>
</div>
<div class="col-lg-12 btn_cart_wrap">
<?php $form = \yii\widgets\ActiveForm::begin() ?>

<?   $cookies = \Yii::$app->response->cookies;
      if(!$cookies->has('name') && !$cookies->has('email') && !$cookies->has('phone') ):?>

  <h4>Данные покупателя</h4>

      <?= $form->field($order, 'name') ?>
      <?= $form->field($order, 'email') ?>
      <?= $form->field($order, 'phone') ?>


    <?= \yii\helpers\Html::submitButton('Отменить заказ', ['class' => 'submit btn btn-danger','value'=>'fail', 'name'=>'submit']) ?>
    <?= \yii\helpers\Html::submitButton('Подтвердить заказ', ['class' => 'submit btn btn-success ','value'=>'check', 'name'=>'submit']) ?>
    <?php \yii\widgets\ActiveForm::end() ?>
</div>


          <?else:?>
                <?= \yii\helpers\Html::submitButton('Отменить заказ', ['class' => 'submit btn btn-danger','value'=>'fail', 'name'=>'submit']) ?>
                <?= \yii\helpers\Html::submitButton('Подтвердить заказ', ['class' => 'submit btn btn-success ','value'=>'check', 'name'=>'submit']) ?>
                <?php \yii\widgets\ActiveForm::end() ?>
          </div>
        <?php endif;?>


<?php endif;?>
