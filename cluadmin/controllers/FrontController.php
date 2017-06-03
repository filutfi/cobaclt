<?php

namespace app\controllers;
use Yii;
use app\models\Katagori;
use yii\data\ActiveDataProvider;
use app\models\ContactForm;
use yii\web\Controller;

class FrontController extends \yii\web\Controller
{

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
      $this->layout='main_front';

      // $dataProvider = new ActiveDataProvider([
      //     'query' => Katagori::find(),
      // ]);
      //
      // return $this->render('index', [
      //     'dataProvider' => $dataProvider,
      // ]);
      //diats yang asli
      $model = new ContactForm();
      if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
          Yii::$app->session->setFlash('contactFormSubmitted');

          return $this->refresh();
      }

      return $this->render('index', [
          'model' => $model,
      ]);
    }
    public function actionKat($kat)
    {
      $this->layout='main_front';
      $model = new ContactForm();
      if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
          Yii::$app->session->setFlash('contactFormSubmitted');

          return $this->refresh();
      }

      return $this->render('post_kat', ['kat' => $kat,'model' => $model]);
    }
    public function actionDetail($link)
    {
      $this->layout='main_front';
      $model = new ContactForm();
      if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
          Yii::$app->session->setFlash('contactFormSubmitted');

          return $this->refresh();
      }
      return $this->render('detail', ['link' => $link,'model' => $model]);
    }

}
