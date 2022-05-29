<?php

namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class DefaultController extends AppAdminController
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
