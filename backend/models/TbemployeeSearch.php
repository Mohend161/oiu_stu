<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbemployee;

/**
 * TbemployeeSearch represents the model behind the search form of `backend\models\Tbemployee`.
 */
class TbemployeeSearch extends Tbemployee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmpID', 'Lon', 'isopen', 'oldlon', 'oldisopen'], 'integer'],
            [['EmpName'], 'safe'],
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
        $query = Tbemployee::find();

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
            'EmpID' => $this->EmpID,
            'Lon' => $this->Lon,
            'isopen' => $this->isopen,
            'oldlon' => $this->oldlon,
            'oldisopen' => $this->oldisopen,
        ]);

        $query->andFilterWhere(['like', 'EmpName', $this->EmpName]);

        return $dataProvider;
    }
}
