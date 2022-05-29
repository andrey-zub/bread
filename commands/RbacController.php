<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
use app\model\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;

        // Удалить стпрые записи
        $auth->removeAll();

        //Создадим роли

        $manager = $auth->createRole('manager');
        $admin = $auth->createRole('admin');


          //Запись ролей в бд

          $auth->add($manager);
          $auth->add($admin);

          // Добавляем и описываем роли
          $AdminPanel = $auth->createPermission('AdminPanel');
          $AdminPanel->description = 'Панель Администратора ';


          $PanelManager = $auth->createPermission('PanelManager');
          $PanelManager->description = 'Панель менеджера ';


          //  Записываем роли в бд
            $auth->add($AdminPanel);
          $auth->add($PanelManager);


          // Разрешение админа
          $auth->addChild($admin, $AdminPanel);

          //  Присваеваем разрешение ролям
          $auth->addChild($manager, $PanelManager);





          //  Прописываем админа и менджера
          $auth->assign($admin, 101);
          $auth->assign($manager, 201);








    }
}
