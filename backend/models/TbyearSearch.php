<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbyear;

/**
 * TbyearSearch represents the model behind the search form of `backend\models\Tbyear`.
 */
class TbyearSearch extends Tbyear
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['YearID'], 'integer'],
            [['YearName'], 'safe'],
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
        $query = Tbyear::find();

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
            'YearID' => $this->YearID,
        ]);

        $query->andFilterWhere(['like', 'YearName', $this->YearName]);

        return $dataProvider;
    }
}
