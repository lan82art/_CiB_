<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `common\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','title', 'slug', 'cat_id', 'ucat_id', 'code', 'picture', 'izmer', 'offer', 'descript_id'], 'safe'],
            [['category_id', 'bonus', 'active', 'novelty', 'seed_group', 'eav'], 'integer'],
            [['price', 'fas'], 'number'],
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
        $query = Goods::find();

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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'fas' => $this->fas,
            'bonus' => $this->bonus,
            'active' => $this->active,
            'novelty' => $this->novelty,
            'seed_group' => $this->seed_group,
            'eav' => $this->eav,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'cat_id', $this->cat_id])
            ->andFilterWhere(['like', 'ucat_id', $this->ucat_id])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'izmer', $this->izmer])
            ->andFilterWhere(['like', 'offer', $this->offer])
            ->andFilterWhere(['like', 'descript_id', $this->descript_id]);

        return $dataProvider;
    }
}
