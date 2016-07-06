<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * ArticlesSearch represents the model behind the search form about `common\models\Articles`.
 */
class ArticlesSearch extends Articles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'art_cat_id', 'is_news', 'created_at','updated_at'], 'integer'],
            [['author', 'art_title', 'article'], 'safe'],
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
        $query = Articles::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'art_cat_id' => $this->art_cat_id,
            'is_news' => $this->is_news,
            //'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'art_title', $this->art_title])
            ->andFilterWhere(['like', 'article', $this->article]);

        return $dataProvider;
    }
}
