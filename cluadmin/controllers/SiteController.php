<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
      //$this->redirect ( array ('/front'));
      $this->layout='main_login';
      return $this->render('login');
    }

    public function actionLogin()
    {
        $this->layout='main_login';
        if (!\Yii::$app->user->isGuest) {
            $this->redirect ( array ('posts/index'));
            return;
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
          $this->redirect ( array ('posts/index'));
          return;// $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->redirect ( array ('site/login'));
        //return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
      return $this->render('about');
    }

    public function actionHello($message = 'Hello')
    {
        return $this->render('hello', ['message' => $message]);
    }

    public function actionEntry()
   {
       $model = new EntryForm();

       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           // valid data received in $model

           // do something meaningful here about $model ...

           return $this->render('entry-confirm', ['model' => $model]);
       } else {
           // either the page is initially displayed or there is some validation error
           return $this->render('entry', ['model' => $model]);
       }
   }

}
