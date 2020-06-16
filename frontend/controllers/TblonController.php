<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tblon;
use frontend\models\TblonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblonController implements the CRUD actions for Tblon model.
 */
class TblonController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Tblon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		  //  لم يتم تصفية العهده
        $dataProvider->query->andWhere(['or', ['Finish'=> '0'],]) ->orderBy(['ID' => SORT_DESC ]);
                  
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblon model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->request->isAjax){
                 return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
        }
         else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
     }


        /**   if(Yii::$app->request->isAjax){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
       */
    /**
     * Creates a new Tblon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblon();

        if ($model->load(Yii::$app->request->post())) {
                              $model->Archive=0;
                              $model->Finish=0;
                              $model->ProcedureDatfin=0;
                             // $model->det=0;
                              $model->ID=0;
                              $model->UserID=0;

               //$model->LonDate=date('Y-m-d h:m:s');
                $model->save();
            return $this->redirect(['view', 'id' => $model->LonID]);
        }

       if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->LonID]);
        }
      if(Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('update', [
               'model' => $model,
            ]);
        }

       }
    /**
     * Deletes an existing Tblon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblon::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
