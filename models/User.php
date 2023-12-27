<?php
namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;

    public static function tableName()
    {
        return 'user';
    }
    
    public function rules()
    {
        return [
            [['username','email','password','birthdate','phone'],'required'],
            [['password'],'string','min'=>6]
        ];
    }
    public function attributeLabels()
    {
        return[
            'id' => 'id',
            'username' => 'Username',
            'email'=>'Email',
            'phone'=>'Phone',
            'birthdate'=>'Birthdate',
            'password' =>'Password',
            'created_at'=>'Created At',
        ];
    }
    public static function findByEmail($email)
    {
        return static::findOne(['email'=>$email]);
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}