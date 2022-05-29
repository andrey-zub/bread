<?

        use yii\helpers\Url;

        $session = Yii::$app->session;


          $session->destroy();

        Yii::$app->response->redirect(Url::to(['page/cart'], true));
