<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblon;

/**
 * TblonSearch represents the model behind the search form of `frontend\models\Tblon`.
 */
class TblonSearch extends Tblon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LonID','CollegeID', 'Finish', 'CurrID', 'Archive', 'det', 'ID', 'UserID'], 'integer'],
            [['LonDate', 'EmpID','TypeID', 'Note', 'Notes', 'ProcedureDatfin'], 'safe'],
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
        $query = Tblon::find();

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
                    $query->joinWith('emp');
					$query->joinWith('type');
        // grid filtering conditions
        $query->andFilterWhere([
            'LonID' => $this->LonID,
            'LonDate' => $this->LonDate,
            'Maount' => $this->Maount,
           
            //'TypeID' => $this->TypeID,
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
            ->andFilterWhere(['like', 'Notes', $this->Notes])
             ->andFilterWhere(['like', 'tbemployee.EmpName', $this->EmpID])
			 ->andFilterWhere(['like', 'tbtypelan.TypeName', $this->TypeID]);
        return $dataProvider;
    }
}
