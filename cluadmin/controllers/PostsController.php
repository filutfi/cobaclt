<?php

namespace app\controllers;

use Yii;
use app\models\Posts;
use app\models\VAllPost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\base\ErrorException;
/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => VAllpost::find()->orderBy('post_date desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/public_html/uploads/';
        $model = new Posts();
          if ($model->load(Yii::$app->request->post())) {
              // get the uploaded file instance. for multiple file uploads
              // the following data will return an array
              $post = Yii::$app->request->post();
              if($post['Posts']['id_kat']!="25"){
                $image = UploadedFile::getInstance($model, 'image');
                if($image==null || $image==""){
                  echo "<h1 style='color:red;background:#ccc;margin:0 auto;width:400px;text-align:center'>Silahkan kembali dan masukkan gambar sebagai identitas post</h1>";
                  return;
                }
                // store the source file name
                //$model->gambar = $image->name;
                $ext = end((explode(".", $image->name)));

                $model->gambar =date("hymdis").".{$ext}";
                // generate a unique file name

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->gambar;
              }

              if($model->save()){
                if($post['Posts']['id_kat']!="25") $image->saveAs($path);

                $model = $this->findModel($model->ID);
                return $this->redirect(['update','id'=>$model->ID]);
              }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //nothing
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/public_html/uploads/';
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                // get the uploaded file instance. for multiple file uploads
                // the following data will return an array
                $image = UploadedFile::getInstance($model, 'image');
                if($image==null || $image==""){
                  return $this->render('update', [
                      'model' => $model,
                  ]);
                }else{
                    try{
                      unlink(Yii::$app->params['uploadPath'] . $model->gambar);
                    }catch(ErrorException $ex){};
                    // store the source file name
                    $ext = end((explode(".", $image->name)));

                    $model->gambar =date("hymdis").".{$ext}";
                    // generate a unique file name

                    // the path to save file, you can set an uploadPath
                    // in Yii::$app->params (as used in example below)
                    $path = Yii::$app->params['uploadPath'] . $model->gambar;

                    if($model->save()){
                      $image->saveAs($path);
                      //copy ke folder thumb
                      //copy($path,Yii::$app->params['uploadPath']."/thumb/".$model->gambar);
                      // Image::getImagine()
                      //   	->open($path)
                      //   	->thumbnail(new Box(300, 272))
                      //   	->save(Yii::$app->params['uploadPath']."/thumb/".$model->gambar);


                      //$model = $this->findModel($model->ID);
                      // return $this->redirect(['view', 'id'=>$model->ID]);
                      return $this->render('update', [
                          'model' => $model,
                      ]);
                    } else {
                        // error in saving model
                    }
                }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionUbahsts($message)
    {
        //return $this->render('hello', ['message' => $message]);
        echo Html::a($message, ['posts/ubahsts','message'=>$message], ['class' => 'btn btn-lg btn-danger']);

    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	public function actionHapus($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
