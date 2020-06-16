<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tbfiltrate;

/**
 * TbfiltrateSearch represents the model behind the search form of `frontend\models\Tbfiltrate`.
 */
class TbfiltrateSearch extends Tbfiltrate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FiltrID', 'LonID', 'TySectionID', 'Archive', 'YearID'], 'integer'],
            [['ProcedureDate'], 'safe'],
            [['Money'], 'number'],
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
        $query = Tbfiltrate::find();

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
            'FiltrID' => $this->FiltrID,
            'LonID' => $this->LonID,
            'TySectionID' => $this->TySectionID,
            'ProcedureDate' => $this->ProcedureDate,
            'Money' => $this->Money,
            'Archive' => $this->Archive,
            'YearID' => $this->YearID,
        ]);

        return $dataProvider;
    }
}
