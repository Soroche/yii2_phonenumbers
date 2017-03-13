<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Person;
use frontend\models\PersonSearch;
use frontend\models\PhoneNumbers;
use frontend\models\PhoneNumbersSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
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
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        /*$model = new Person();
        $dataProv = $model->getPhones();
        */
        $searchModel = new PhoneNumbersSearch();

        //$dataProv = PhoneNumbers::find()->where(['pesron_id'=>$id])->all();
        /*$rows = (new \yii\db\Query())
            ->select(['id', 'phone'])
            ->from('phone_numbers')
            ->where(['pesron_id' => $id])
            ->all();*/

        $dataProvider = new ActiveDataProvider(
            [
            'query'=> PhoneNumbers::find()->where(['pesron_id'=>$id]),
            ]);
                
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'dataProv' => $dataProv,
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreatephone()
    {
        $model = new PhoneNumbers();
        //$model = $this->findModelPhone($model->pesron_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pesron_id]);
        } else {
            return $this->render('createphone', [
                'model' => $model,
                'number' => $model->pesron_id,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatephone($id)
    {
        $model_phone = $this->findModelPhone($id);

        if ($model_phone->load(Yii::$app->request->post()) && $model_phone->save()) {
            return $this->redirect(['view', 'id' => $model_phone->id]);
        } 
        else {
            return $this->render('updatephone', [
                'model_phone' => $model_phone,
            ]);
        }
    }

    /**
     * Deletes an existing Person model.
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
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPhone($id)
    {
        if (($model = PhoneNumbers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
