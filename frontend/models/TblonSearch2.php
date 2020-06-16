<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblon2;

/**
 * TblonSearch2 represents the model behind the search form of `frontend\models\Tblon2`.
 */
class TblonSearch2 extends Tblon2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LonID', 'EmpID', 'TypeID', 'CollegeID', 'Finish', 'CurrID', 'Archive', 'det', 'ID', 'UserID'], 'integer'],
            [['LonDate', 'Note', 'Notes', 'ProcedureDatfin'], 'safe'],
            [['Maount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tblon2::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'LonID' => $this->LonID,
            'LonDate' => $this->LonDate,
            'Maount' => $this->Maount,
            'EmpID' => $this->EmpID,
            'TypeID' => $this->TypeID,
            'CollegeID' => $this->CollegeID,
            'Finish' => $this->Finish,
            'CurrID' => $this->CurrID,
            'ProcedureDatfin' => $this->ProcedureDatfin,
            'Archive' => $this->Archive,
            'det' => $this->det,
            'ID' => $this->ID,
            'UserID' => $this->UserID,        
        ]);

        $query->andFilterWhere(['like', 'Note', $this->Note])
            ->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
