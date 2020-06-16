<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbcollege;

/**
 * TbcollegeSearch represents the model behind the search form of `backend\models\Tbcollege`.
 */
class TbcollegeSearch extends Tbcollege
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CollegeID'], 'integer'],
            [['CollegeName'], 'safe'],
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
        $query = Tbcollege::find();

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
            'CollegeID' => $this->CollegeID,
        ]);

        $query->andFilterWhere(['like', 'CollegeName', $this->CollegeName]);

        return $dataProvider;
    }
}
