<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use app\models\ProfileForm;
use app\models\PasswordForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->signup()){
                return $this->redirect(['site/index']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());

            if($model->login()){
                return $this->render('index');
            }
        }
        return $this->render('login',['model'=>$model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('login');
    }

    public function actionProfile()
    {
        $model = new ProfileForm();
        $user = Yii::$app->user->identity;

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());

            if($model->updateUser($user->id)){
                return $this->redirect(['site/profile']);
            }
        }

        return $this->render('profile',['user'=>$user,'model'=>$model]);
    }

    public function actionPassword()
    {
    
        return $this->render('password');
    }
}
