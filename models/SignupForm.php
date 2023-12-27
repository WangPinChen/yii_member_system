<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $birthdate;
    public $phone;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            [['username','email','birthdate','phone','password','password_confirm'],'required'],
            ['email','email'],
            ['password','string','min'=>6]
        ];
    }
    public function signup()
    {
        if($this->validate()){
            $user = new User();
            $user->username = $this->username;
            $user->password = $this->password;
            $user->phone = $this->phone;
            $user->birthdate = Yii::$app->formatter->asDate($this->birthdate, 'yyyy-MM-dd');
            $user->email = $this->email;
            if($user->save()){
                return true;
            }            
        }
        return false;
    }
}
