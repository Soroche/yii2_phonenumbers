<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Person;
use frontend\models\PhoneNumber;
use frontend\models\PhoneNumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use borales\extensions\phoneInput\PhoneInputBehavior;

/**
 * PhoneNumberController implements the CRUD actions for PhoneNumber model.
 */
class PhoneNumberController extends Controller
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
                'phoneInput' => PhoneInputBehavior::className(),
                ],
            
            ],
        ];
    }

    /**
     * Lists all PhoneNumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhoneNumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('person/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhoneNumber model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->redirect(['person/view', 'id' => $model->person_id]);
    }

    /**
     * Creates a new PhoneNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $personId
     * @return mixed
     */
    public function actionCreate($personId)
    {
        $model = new PhoneNumber();
        $model->person_id = $personId;
        $modelPerson = Person::find()->where(['id'=>$personId])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['person/view', 'id' => $model->person_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelPerson' =>$modelPerson,

            ]);
        }
    }

    /**
     * Updates an existing PhoneNumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelPerson = Person::find()->where(['id'=>$model->person_id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['person/view', 'id' => $model->person_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelPerson' =>$modelPerson,
            ]);
        }
    }

    /**
     * Deletes an existing PhoneNumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->delete();

        return $this->redirect(['person/view', 'id' => $model->person_id]);
    }

    /**
     * Finds the PhoneNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhoneNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhoneNumber::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
