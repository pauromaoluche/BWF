<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PageInformation;

/**
 * PageInformationSearch represents the model behind the search form of `common\models\PageInformation`.
 */
class PageInformationSearch extends PageInformation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'maxlength', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['title', 'subtitle', 'text', 'code', 'image', 'file', 'html', 'is_page', 'status'], 'safe'],
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
        $query = PageInformation::find();

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
            'id' => $this->id,
            'maxlength' => $this->maxlength,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'html', $this->html])
            ->andFilterWhere(['like', 'is_page', $this->is_page])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
