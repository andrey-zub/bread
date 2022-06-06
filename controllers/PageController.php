<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotAcceptableHttpException;
use yii\data\ArrayDataProvider;
use app\models\ProductSearch;
use app\models\Product;
use app\models\OrderCheck;
use app\models\Owner;
use app\models\OrderInfo;
use app\models\BakerInfo;
use app\models\Report;


const SECRET_KEY = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6ImpuNHNpNC0wMCIsInVzZXJfaWQiOiI3OTUxNDkxNTk2MiIsInNlY3JldCI6IjM0NTg0Mjk5Njg4MWI0MDEyYjAxNmZmZGU4YTEwM2Q3ODE1YWJmYTMyNzIxZGVjMDViZjNmM2VjNWQwNDdmMTQifX0=';


/*Контроллер для страниц сайта*/
class PageController extends SiteController
{
  public function actionBan() {  return $this->render('ban'); }

  public function actionProduct()
  {
      $searchModel = new ProductSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('product', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
  }

  /**
    Для страницы корзина
   */
  public function actionCart()
  {
      $session = Yii::$app->session;
      if($session->has('productsSession')){ $productsSession = $session->get('productsSession'); }
      else{  $productsSession = array(); }

      if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
          $productsArray = Product::find()->where(['id' => $_GET['id']])->asArray()->one();
          if(is_array($productsArray) && count($productsArray) > 0){
              $flag = false;
              for($i = 0; $i < count($productsSession); $i++){
                  if($productsSession[$i]['id'] == $_GET['id']){
                      $flag = true;
                      break;
                  }
              }
              if(!$flag){  array_push($productsSession, ['id' => $_GET['id'], 'count' => 1 ]);  }
          }
      }
      $session->set('productsSession', $productsSession);
      $productsSession = $session->get('productsSession');
      $arrayID = array();
      foreach($productsSession as $value){  array_push($arrayID, $value['id']); }

      $products = Product::find()->where(['id' => $arrayID])->asArray()->All();

      foreach($products as $key => $value){ $products[$key]['count_cart'] = $productsSession[$key]['count'] ; }

      foreach($products as $key => $value){ $amount += $products[$key]['count_cart'] * $products[$key]['price']  ; }

              if (  $session->has('product')  ){
                         $product= $session->get('product');
                         $session->set('product',$products);
              }  else {  $session->set('product',$products); }
      $session->set('amount',$amount);

  return $this->render('cart', [
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $product,
                'key'=>'id',
                'pagination' => [
                    'pageSize' => 50,
                ],
            ]),
            'products'=>$product,
        ]);
}



//--------------------------------------------------------
public function actionCartDeBuff(){
$session = Yii::$app->session;
    if($session->has('product')){  $product = $session->get('product');  }
    else{  $product = array();   }

    foreach ( $product as $key => $value){
        if($product[$key]['id'] == $_GET['id']){
            $product[$key]['count_cart']--  ;
            break;
        }
    }
 $session->set('product',$product);

 return $this->render('cart-de-buff', [
           'dataProvider' => new ArrayDataProvider([
               'allModels' => $product,
               'key'=>'id',
               'pagination' => [
                   'pageSize' => 50, ],
           ]),
           'products'=>$product,
       ]);
}

public function actionCartBuff(){
$session = Yii::$app->session;

    if($session->has('product')){  $product = $session->get('product');  }
    else{  $product = array();   }

    foreach ( $product as $key => $value){
        if($product[$key]['id'] == $_GET['id']){
            $product[$key]['count_cart']++  ;
            break;
        }
    }
 $session->set('product',$product);

 return $this->render('cart-buff', [
           'dataProvider' => new ArrayDataProvider([
               'allModels' => $product,
               'key'=>'id',
               'pagination' => [
                   'pageSize' => 50,
               ],
           ]),
           'products'=>$product,
       ]);
}



public function actionCheckout(){
      $order = new OrderCheck();
      $session = Yii::$app->session;
      if($order->load(\Yii::$app->request->post())){
            $billPayments = new \Qiwi\Api\BillPayments(SECRET_KEY);
              $publicKey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPsZ232WYoMXoun8DPNcoxZShiC2AwFPnt34SX1pQSww7jFGZVyhe8rG5QDXhLZtNj48CSZbLydDrzxsXKazhXrwtNNP1wXryNtoteA6pDp';
              $params = [
              'publicKey' => $publicKey,
              'amount' =>   1,   //$sum,
              'billId' => $billId = $billPayments->generateId(),
              'lifetime' => $lifetime = $billPayments->getLifetimeByDay(1),
              'successUrl' => 'http://bread/page/check',
              ];
                          $cookies = \Yii::$app->response->cookies;
                          $cookies->add(new \yii\web\Cookie([
                          'name' => 'email',
                          'value' => $order->email
                          ]));
                          $cookies->add(new \yii\web\Cookie([
                          'name' => 'name',
                          'value' => $order->name
                          ]));
                          $cookies->add(new \yii\web\Cookie([
                          'name' => 'id',
                          'value' => $billId
                          ]));
                          $cookies->add(new \yii\web\Cookie([
                          'name' => 'phone',
                          'value' => $order->phone
                          ]));
                          $cookies->add(new \yii\web\Cookie([
                          'name' => 'amount',
                          'value' => $session->get('amount')
                          ]));

              $link = $billPayments->createPaymentForm($params);
              $session = Yii::$app->session;
              $session->set('link',  $link);
        }

        if (Yii::$app->request->post('submit') === 'check'){  return $this->redirect($link);}
        elseif (Yii::$app->request->post('submit') === 'fail') { return $this->redirect(['page/check-fail']); }

        $cookies = \Yii::$app->response->cookies;
        unset($cookies['email']);
        unset($cookies['name']);
        unset($cookies['phone']);
        unset($cookies['id']);
        unset($cookies['amount']);
      return $this->render('checkout',compact('session','order'))  ;
      }

// Успешная оплата заказа
public function actionCheck()
      {
            $billPayments = new \Qiwi\Api\BillPayments(SECRET_KEY);
        $session = Yii::$app->session;
          $cookies = \Yii::$app->request->cookies;

          // Сохранение данных о заказе
          $email = $cookies->getValue('email');
          $name = $cookies->getValue('name');
          $phone = $cookies->getValue('phone');
          $id = $cookies->getValue('id');
          $amount = $cookies->getValue('amount');

                   $new_ord_id = new OrderCheck();
            // Запись данных о заказе
            $ord = new OrderCheck();
              $ord->owner_id = $new_ord_id->find(['id'])->count() + 1;
              $ord->manager_id =  rand(201,203);
              $ord->date_init = date('Y-m-d');
              $ord->name = $name;
              $ord->phone = $phone;
              $ord->email = $email;
              $ord->amount = $amount;
              if($session->has('link') && !empty($id)) {
                    $ord->finish = 'true';
                    $ord->billid = $id;
              } else {
                  $ord->finish = 'false';
                  $ord->billid = $id;
                  $ord->save();
                return $this->render('check-fail', compact('session','ord','response'));
              }
            $ord->save();

            // запись данных о заказчике
          $ownr = new Owner;
            $ownr->owner_id =  $ord->owner_id;
            $ownr->email =  $ord->email;
            $ownr->name =  $ord->name;
            $ownr->phone =  $ord->phone;
            $ownr->save();

            //Запись данных по заказу
            $prod_inf = $session->get('product');

            $baker = rand(301,305);

            foreach($prod_inf as $key => $value){
              $ord_inf = new OrderInfo;
                      $ord_inf->order_id = $ord->id;
                      $ord_inf->owner_id = $ord->owner_id;
                      $ord_inf->manager_id = $ord->manager_id;
                      $ord_inf->baker_id =   $baker;
                      $ord_inf->product_id = $prod_inf[$key]['id'];
                      $ord_inf->order_status = 'true' ;
                      $ord_inf->save();
            }





            $report= new Report();
              $report->owner_name = $ord->name;
              $report->owner_email = $ord->email;
              $report->status = $ord->finish;
              $report->pay_sum = $ord->amount;
              $report->pay_id = $ord->billid;
              $report->manager_id = $ord->manager_id;
              $report->boss_id = 501;
              $report->save();


            unset($session['link']);
            unset($session['productsSession']);
            unset($session['product']);
            unset($session['amount']);



          return $this->render('check', compact('session','order','response'));

  	}

// Отмена заказа
    public function actionCheckFail()
    {

      $session = Yii::$app->session;
        $cookies = \Yii::$app->request->cookies;

        // Сохранение данных о заказе
        $email = $cookies->getValue('email');
        $name = $cookies->getValue('name');
        $phone = $cookies->getValue('phone');
        $id = $cookies->getValue('id');
        $amount = $cookies->getValue('amount');

         $new_ord_id = new OrderCheck();
          // Запись данных о заказе
          $ord = new OrderCheck();
            $ord->owner_id = $new_ord_id->find(['id'])->count() + 1;
            $ord->manager_id =  rand(201,203);
            $ord->date_init = date('Y-m-d');
            $ord->name = $name;
            $ord->phone = $phone;
            $ord->email = $email;
            $ord->amount = $amount;
                $ord->finish = 'false';
                $ord->billid = $id;
          $ord->save();

          // запись данных о заказчике
        $ownr = new Owner;
          $ownr->owner_id =  $ord->owner_id;
          $ownr->email =  $ord->email;
          $ownr->name =  $ord->name;
          $ownr->phone =  $ord->phone;
          $ownr->save();

          //Запись данных по заказу
          $prod_inf = $session->get('product');

          $baker = rand(301,305);

          foreach($prod_inf as $key => $value){
            $ord_inf = new OrderInfo;
                    $ord_inf->order_id = $ord->id;
                    $ord_inf->owner_id = $ord->owner_id;
                    $ord_inf->manager_id = $ord->manager_id;
                    $ord_inf->baker_id =   $baker;
                    $ord_inf->product_id = $prod_inf[$key]['id'];
                    $ord_inf->order_status = 'false' ;
                    $ord_inf->save();
          }


          $report= new Report();
            $report->owner_name = $ord->name;
            $report->owner_email = $ord->email;
            $report->status = $ord->finish;
            $report->pay_sum = $ord->amount;
            $report->pay_id = $ord->billid;
            $report->manager_id = $ord->manager_id;
            $report->boss_id = 501;
            $report->save();

            unset($session['link']);
            unset($session['productsSession']);
            unset($session['product']);
            unset($session['amount']);




        return $this->render('check-fail', compact('session', 'order','response'));
  }

}
