<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DistrictEmail;

/**
 * DistrictEmailSearch represents the model behind the search form about `app\models\DistrictEmail`.
 */
class DistrictEmailSearch extends DistrictEmail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['districtemail_id'], 'integer'],
            [['district_name', 'district_email', 'add_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = DistrictEmail::find();

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
            'districtemail_id' => $this->districtemail_id,
            'add_on' => $this->add_on,
        ]);

        $query->andFilterWhere(['like', 'district_email', $this->district_email])
            ->andFilterWhere(['like', 'district_name', $this->district_name]);

        return $dataProvider;
    }
}
