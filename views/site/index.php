<?php
use app\components\Table;
$this->title = 'bread /...';
?>
<div class="site-index">
    <div class="body-content">
      <div class="row">

        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-8">
              <h1>Меню товаров</h1>
              <p>Список товаров</p>
              <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['page/product/'])?>">Перейти</a></p>
            </div>
          </div>

        <div class="row">
          <div class="col-lg-8">
              <h1>-----------------</h1>
          </div>
        </div>
      </div>

        <div class="col-lg-4">
          <div class="row">
            <h2>Административный модуль</h2>
            <p>Модуль для работы с администратором</p>
            <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['admin/'])?>">Перейти</a></p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row">
            <h2>Меню менеджера</h2>
            <p>Интерфейс для работы с менеджером</p>
            <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['manager/'])?>">Перейти</a></p>
          </div>
        </div>
    </div>
  </div>
  </div>
