<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }



  

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
        ];
    }


    public function getId0()
    {
        return $this->hasOne(Employee::className(), ['id' => 'id']);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findIdentity($id)
    {
        return  static::findOne($id);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }


    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
         return Yii::$app->security->validatePassword($password, $this->password);
    }

  public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }



  public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
    }






}
