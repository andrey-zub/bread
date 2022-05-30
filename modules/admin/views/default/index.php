<?

$this->title = 'Admin panel';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Admin panel',
    'url'=>Yii::$app->urlManager->createUrl(['admin/'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Product menu',
    'url'=>Yii::$app->urlManager->createUrl(['page/product'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Manager menu',
    'url'=>Yii::$app->urlManager->createUrl(['manager/'])
);


?>


<div class="admin-default-index">
 <h3>Административный модуль</h3>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Сотрудники</h2>

                <p>Страница для работы с таблицей [ Сотрудники  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/employee'])?>">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Товар</h2>

                <p>Страница для работы с таблицей [ Товар  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Перейти</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Тех. карта</h2>

                <p>Страница для работы с таблицей [ Тех. карта  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/tech-card'])?>">Перейти</a></p>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
                <h3>-----------------------------------------------------------------------------------------------------------------------------------------</h3>
           </div>
         </div>


        <div class="row">
            <div class="col-lg-4">
                <h2>Заказчики</h2>

                <p>Страница для работы с таблицей [ Заказчики  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/owner'])?>">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Информация по заказам</h2>

                <p>Страница для работы с таблицей [ Информация по заказам  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/order-info'])?>">Перейти</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Заказы</h2>

                <p>Страница для работы с таблицей [ Заказы  ]</p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/order-check'])?>">Перейти</a></p>
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

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/report'])?>">Перейти</a></p>
            </div>




        </div>

</div>

</div>
