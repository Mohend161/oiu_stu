<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblistreturn;

/**
 * TblistreturnSearch represents the model behind the search form of `frontend\models\Tblistreturn`.
 */
class TblistreturnSearch extends Tblistreturn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RetID', 'PayID', 'EmpID', 'ItemID', 'IsPrint', 'UserID', 'Accept'], 'integer'],
            [['Amount'], 'number'],
            [['Notes'], 'safe'],
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
        $query = Tblistreturn::find();

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
            'RetID' => $this->RetID,
            'PayID' => $this->PayID,
            'EmpID' => $this->EmpID,
            'Amount' => $this->Amount,
            'ItemID' => $this->ItemID,
            'IsPrint' => $this->IsPrint,
            'UserID' => $this->UserID,
            'Accept' => $this->Accept,
        ]);

        $query->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
