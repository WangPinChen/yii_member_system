<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return[
            [['email','password'],'required'],
            ['email','email']
        ];
    }

    public function login()
    {
        if($this->validate()){
            $user = User::findByEmail($this->email);

            if($user && $user->password === $this->password){
                return Yii::$app->user->login($user,7200);
            }
        }
        return false;
    }

}
