<?

$this->title = 'Manager panel';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager panel',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Product menu',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Admin menu',
    'url'=>Yii::$app->urlManager->createUrl(['admin/'])
);


?>


<div class="manager-default-index">
 <h3>Модуль менеджера</h3>

    <div class="body-content">


         </div>


        <div class="row">
            <div class="col-lg-4">
                <h2>Заказчики</h2>

                <p>Страница для работы с таблицей [ Заказчики  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['manager/owner'])?>">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Информация по заказам</h2>

                <p>Страница для работы с таблицей [ Информация по заказам  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['manager/order-info'])?>">Перейти</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Заказы</h2>

                <p>Страница для работы с таблицей [ Заказы  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['manager/order-check'])?>">Перейти</a></p>
            </div>
        </div>

                <div class="row">
                  <div class="col-lg-12">
                        <h3>-----------------------------------------------------------------------------------------------------------------------------------------</h3>
                   </div>
                 </div>

        <div class="row">

            <div class="col-lg-4">   </div>

            <div class="col-lg-6">
                <h2>Отчетность по закрытым заказам</h2>

                <p>Страница для работы с таблицей [ Отчетность по закрытым заказам  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['manager/report'])?>">Перейти</a></p>
            </div>




        </div>

</div>

</div>
