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

    public function updateUser()
    {
        
    }

}