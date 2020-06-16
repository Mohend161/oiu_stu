<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tblon2;
use frontend\models\TblonSearch2;
use yii\web\Controller;
use frontend\models\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Tbfiltrate;
use yii\helpers\ArrayHelper;
/**
 * Tblon2Controller implements the CRUD actions for Tblon2 model.
 */
class Tblon2Controller extends Controller
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
     * Lists all Tblon2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblonSearch2();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
  //  لم يتم تصفية العهده
     //  $dataProvider->query->andWhere(['or', ['Finish'=> '0'],['Archive'=> '0'],]) ->orderBy(['ID' => SORT_DESC ]);
         $dataProvider->query->andWhere(['or',['Archive'=> '0'],]) ->orderBy(['ID' => SORT_DESC ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblon2 model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
	{
	    $model = $this->findModel($id);
	    $tbfiltrates = $model->tbfiltrates;
         { if(Yii::$app->request->isAjax){
                 return $this->renderAjax('view', [
            'model' => $this->findModel($id),
			 'model' => $model,
            'tbfiltrates' => $tbfiltrates,
        ]);
        }
         else{
            return $this->render('view', [
                'model' => $this->findModel($id),
				 'model' => $model,
            'tbfiltrates' => $tbfiltrates,
            ]);
        }
	 }
	}
    

    /**
     * Creates a new Tblon2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblon2();
        $modelsTbfiltrate= [new Tbfiltrate];
		//$model->Finish=1;
		 //$model->Archive=0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
            //return $this->redirect(['view', 'id' => $model->LonID]);
			
        $modelsTbfiltrate = Model::createMultiple(Tbfiltrate::classname());
            Model::loadMultiple($modelsTbfiltrate, Yii::$app->request->post());
          
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTbfiltrate) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
					
                    if ($flag = $model->save(false)) {
                        foreach ($modelsTbfiltrate as $modelTbfiltrate) 
						{
                            $modelTbfiltrate-> LonID = $model->LonID;
							//$modelTbfiltrate->Archive=0;
                            if (! ($flag = $modelTbfiltrate->save(false)))
								{
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        //return $this->redirect(['view', 'id' => $model->LonID]);
						return $this->redirect(['view', 'id' => $model->LonID]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
       
           if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                 'model' => $model,
			   'modelsTbfiltrate' => (empty($modelsTbfiltrate)) ? [new Tbfiltrate] : $modelsTbfiltrate
            ]);
        }
        else{
            return $this->render('create', [
                 'model' => $model,
			   'modelsTbfiltrate' => (empty($modelsTbfiltrate)) ? [new Tbfiltrate] : $modelsTbfiltrate
            ]);
        }
      }	
    /**
     * Updates an existing Tblon2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsTbfiltrate = $model->tbfiltrates;

        if ($model->load(Yii::$app->request->post())) {
            $model->Finish=1;
			
            $model->ProcedureDatfin=date('Y-m-d h:m:s');
			
            $oldIDs = ArrayHelper::map($modelsTbfiltrate, 'FiltrID', 'FiltrID');
            $modelsTbfiltrate = Model::createMultiple(Tbfiltrate::classname(), $modelsTbfiltrate);
		   Model::loadMultiple($modelsTbfiltrate, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTbfiltrate, 'FiltrID', 'FiltrID')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsTbfiltrate),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTbfiltrate) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Tbfiltrate::deleteAll(['FiltrID' => $deletedIDs]);
                        }
                        foreach ($modelsTbfiltrate as $modelTbfiltrate) {
                            $modelTbfiltrate->LonID = $model->LonID;
							$modelTbfiltrate->Archive=0;
                            if (! ($flag = $modelTbfiltrate->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->LonID]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

   if(Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                 'model' => $model,
			   'modelsTbfiltrate' => (empty($modelsTbfiltrate)) ? [new Tbfiltrate] : $modelsTbfiltrate
            ]);
        }
        else{
            return $this->render('update', [
                 'model' => $model,
			   'modelsTbfiltrate' => (empty($modelsTbfiltrate)) ? [new Tbfiltrate] : $modelsTbfiltrate
            ]);
        }
	}
	 
    /**
     * Deletes an existing Tblon2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
        // $model = $this->findModel($id);
        // $name = $model->LonID;
        // if ($model->delete()) {
            // Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        // }
        // return $this->redirect(['index']);
  /*   // }    
	public function actionDelete($id)
    {
	$model = $this->findModel($id);
        $tbfiltratesIDs = ArrayHelper::map($model->tbfiltrates, 'FiltrID', 'FiltrID');
       Tbfiltrate::deleteByIDs($tbfiltratesIDs);
        $name = $model->LonID;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    } */
  public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name = $model->LonID;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    } 
/*  public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $tbfltratesIDs = ArrayHelper::map($model->tbfiltrates, 'LonID', 'LonID');
        Tbfiltrate::deleteByIDs(tbfltratesIDs);
        $name = $model->LonID;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    } */
    /**
     * Finds the Tblon2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblon2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblon2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
