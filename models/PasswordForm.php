<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

class Password extends model
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

}
?>