<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SiteUser;

/**
 * SiteUserSearch represents the model behind the search form about `app\models\SiteUser`.
 */
class SiteUserSearch extends SiteUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteuser_id', 'active'], 'integer'],
            [['siteuser_name', 'siteuser_email', 'siteuser_password', 'created_date'], 'safe'],
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
        $query = SiteUser::find();

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
            'siteuser_id' => $this->siteuser_id,
            'active' => $this->active,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'siteuser_name', $this->siteuser_name])
            ->andFilterWhere(['like', 'siteuser_email', $this->siteuser_email])
            ->andFilterWhere(['like', 'siteuser_password', $this->siteuser_password]);

        return $dataProvider;
    }
}
