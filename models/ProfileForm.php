<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class ProfileForm extends Model
{
    public $username;
    public $email;
    public $birthdate;
    public $phone;

    public function rules()
    {
        return [
            [['username','email','birthdate','phone'],'required'],
            ['email','email']
        ];
    }

    public function updateUser($userId)
    {
        if($this->validate()){
            $user = User::findOne($userId);

            if($user){
                $user->username = $this->username;
                $user->email = $this->email;
                $user->birthdate = $this->birthdate;
                $user->phone = $this->phone;

                if($user->save()){
                    return true;
                }
            }
        }
        return false;
    }

}