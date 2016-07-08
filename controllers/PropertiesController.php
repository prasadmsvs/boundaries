<?php

namespace app\controllers;

use Yii;
use app\models\Property;
use app\models\PropertiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PropertiesController implements the CRUD actions for Property model.
 */
class PropertiesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex()
    {
      $model = new Property();
      $properties = $model->getProperties();
      $searchModel = new PropertiesSearch();

      return $this->render('index', [
          'searchModel' => $searchModel,
          'properties'=>$properties
      ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Property model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Property();
        $property  = Yii::$app->request->post();
        $user_id = Yii::$app->user->getId();
        if(isset($property["Property"]) && $user_id){
          $property["Property"] = array_merge($property["Property"],array("user"=>$user_id));
          $model->file = UploadedFile::getInstance($model,'file');
          $model->file->saveAs('uploads/propertyImage'.strtotime('now').'.'.$model->file->extension);
          $model->image='uploads/'."propertyImage".strtotime("now").".".$model->file->extension;
          if ($model->load($property) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
          } else {
            return $this->render('create', [
              'model' => $model,
            ]);
          }
        } else {
          return $this->render('create', [
                  'model' => $model,
          ]);
        }
		
    }

    /**
     * Updates an existing Property model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_user = $model->user;
        $property  = Yii::$app->request->post();
        $user_id = Yii::$app->user->getId();
        if(isset($property["Property"]) && $user_id && $user_id==$model_user){
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
          } else {
              return $this->render('update', [
                  'model' => $model,
              ]);
          }
        } else {
          return $this->render('update', [
                  'model' => $model,
              ]);
        }
    }

    /**
     * Deletes an existing Property model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
