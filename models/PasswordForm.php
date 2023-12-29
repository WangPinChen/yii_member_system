<?php
namespace app\models;
use yii\base\Model;
use app\models\User;

class PasswordForm extends model
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    public function rules()
    {
        return [
            [['oldPassword','newPassword','confirmPassword'],'required'],
            [['oldPassword','newPassword','confirmPassword'],'string','min'=>6]
        ];
    }

    public function changePassword($userId)
    {
        if($this->validate()){
            $user = User::findOne($userId);

            if($user && $user->password === $this->oldPassword){
                $user->password = $this->newPassword;

                if($user->save()){
                    return true;
                }
            }
        }
        return false;
    }
}
?>