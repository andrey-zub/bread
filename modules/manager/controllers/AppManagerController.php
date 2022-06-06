<?php

namespace app\modules\manager\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;


class AppManagerController extends Controller
{

  public function behaviors() {
                 return [
                     'access' => [
                         'class' => AccessControl::class,

                         'rules' => [

                           [
                               'allow'   => false,
                               'roles'   => ['?'],
                           ],
                             [
                                 'allow'   => true,
                                 'roles'   => ['PanelManager','AdminPanel'],
                             ],
                         ],
                     ],
                 ];
            }
}
