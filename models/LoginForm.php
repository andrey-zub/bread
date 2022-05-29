<?php

namespace app\models;

use Yii;
use yii\base\Model;



class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;



    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required','message'=>'поле обязательно к заполнению'],
            ['username','string','min' => '3','tooShort' => 'Ваше имя должно быть не менее 3 символов '],
            ['username','string','max' => '30','tooLong' => 'Ваше имя должно быть не более 30 символов'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


    public function login()
    {
        if ($this->validate()) {
			if ($this ->rememberMe)
			{
					$myuser = $this->getUser();
					$myuser ->generateAuthKey();
					$myuser->save();
			}
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
