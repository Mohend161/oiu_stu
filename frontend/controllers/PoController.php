<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Po;
use frontend\models\PoSearch;
use yii\web\Controller;
use frontend\models\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\PoIteme;
use yii\helpers\ArrayHelper;
/**
 * PoController implements the CRUD actions for Po model.
 */
class PoController extends Controller
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
     * Lists all Po models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Po model.
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
       /**
     * Creates a new Po model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Po();
       $modelsPoItemes= [new PoIteme];
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
			
         
			
			$modelsPoItemes = Model::createMultiple(PoIteme::classname());
            Model::loadMultiple($modelsPoItemes, Yii::$app->request->post());
			
  // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPoItemes),
                    ActiveForm::validate($model)
                );
            }
          
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPoItemes) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPoItemes as $modelPoItem) {
                            $modelPoItem-> po_id = $model->id;
                            if (! ($flag = $modelPoItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
else
{
	 if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                  'model' => $model,
			'modelsPoItemes' => (empty($modelsPoItemes)) ? [new PoIteme] : $modelsPoItemes
            ]);
        }
        else{
            return $this->render('create', [
               'model' => $model,
			   'modelsPoItemes' => (empty($modelsPoItemes)) ? [new PoIteme] : $modelsPoItemes
            ]);
        }
      }	
	}
    /**
     * Updates an existing Po model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
        $modelsPoItemes = $model->poItemes;
	

      if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPoItemes, 'id', 'id');
            $modelsPoItemes = Model::createMultiple(PoIteme::classname(), $modelsPoItemes);
            Model::loadMultiple($modelsPoItemes, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPoItemes, 'id', 'id')));

           

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPoItemes) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            PoIteme::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPoItemes as $modelPoIteme) {
                            $modelPoIteme->po_id = $model->id;
                            if (! ($flag = $modelPoIteme->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
 if(Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                  'model' => $model,
			'modelsPoItemes' => (empty($modelsPoItemes)) ? [new PoIteme] : $modelsPoItemes
            ]);
        }
        else{
            return $this->render('update', [
               'model' => $model,
			   'modelsPoItemes' => (empty($modelsPoItemes)) ? [new PoIteme] : $modelsPoItemes
            ]);
        }
      }	
	 
    /**
     * Deletes an existing Po model.
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


/*
public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelsPoItemes = ArrayHelper::map($model->optionValues, 'id', 'id');
        OptionValue::deleteByIDs($optonValuesIDs);
        $name = $model->name;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    }


/*





    /**
     * Finds the Po model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Po the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Po::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
