<?php

namespace app\modules\manager\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class DefaultController extends AppManagerController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index');
    }
}
