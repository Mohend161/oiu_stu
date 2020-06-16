<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbsection;

/**
 * TbsectionSearch represents the model behind the search form of `backend\models\Tbsection`.
 */
class TbsectionSearch extends Tbsection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TySectionID'], 'integer'],
            [['TySectionName'], 'safe'],
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
        $query = Tbsection::find();

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
            'TySectionID' => $this->TySectionID,
        ]);

        $query->andFilterWhere(['like', 'TySectionName', $this->TySectionName]);

        return $dataProvider;
    }
}
