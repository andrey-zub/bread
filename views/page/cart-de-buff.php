<?php
    use yii\helpers\Url;
;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'Cart menu';
    $this->params['breadcrumbs'][] = array(
        'label'=> 'Product menu',
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





      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'columns' => [
            [
              'label'=>'ID',
              'value'=>'id',
            ],
            [
              'label'=>'Наименование товара',
              'value'=>'product_name',
            ],

            [
              'label'=>'Кол-во товара в корзине',
              'value'=>'count_cart',
            ],
            [
              'label'=>'Цена за единицу товара',
              'value'=>'price',
            ],

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => ' {cart-buff} {cart-de-buff}',
              'buttons' => [

                  'cart-de-buff' => function ($url,$model,$key) {
                      return  Html::a('<span class="glyphicon glyphicon-minus" ></span>', $url);
                  },

                  'cart-buff' => function ($url,$model,$key) {
                      return  Html::a('<span class="glyphicon glyphicon-plus" ></span>', $url);
                  },
            ],
          ],
        ],

      ]); ?>



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
        <?php endforeach;
                  $session = Yii::$app->session;
                  $session->set('amount',$sum);
                  $amount=$sum;
        ?>
        <tr class="cart_prod_footer">
            <td colspan="1" class="null_cart"></td>
            <td colspan="2" class="rez_title_cart">Итого, к оплате:</td>
            <td class="rez_price_cart"><?php echo $amount;?> руб</td>
        </tr>
    </table>
</div>
<div class="col-lg-12 btn_cart_wrap">
    <a href="<?php echo Url::toRoute('page/product');?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки</a>
    <a href="<?php echo Url::toRoute('page/ban');?>" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i>Отчистить корзину</a>
    <a href="<?php echo Url::toRoute('page/checkout');?>" class="btn btn-success">Оформить заказ<i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
<?php endif;?>
