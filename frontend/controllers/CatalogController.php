<?php

namespace frontend\controllers;

use common\models\Goods;
use common\models\GoodsCategory;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class CatalogController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionIndex($id = null)
    {
        /** @var goodsCategory $category */
        $category = null;

        $categories = GoodsCategory::find()->where(['status'=>GoodsCategory::STATUS_ACTIVE])->indexBy('id')->orderBy('id')->all();

        $goodsQuery = Goods::find();
        if ($id !== null && isset($categories[$id])) {
            $category = $categories[$id];
            $goodsQuery->where(['category_id' => $this->getCategoryIds($categories, $id)]);
        }

        $goodsDataProvider = new ActiveDataProvider([
            'query' => $goodsQuery,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        return $this->render('index', [
            'category' => $category,
            'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
            'goodsDataProvider' => $goodsDataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param goodsCategory[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => ($activeId === $category->id) ? true : null,
                    'label' => $category->title,
                    'url' => Url::to(['catalog/index', 'id' => $category->id]),
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }
    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param goodsCategory[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            }
            elseif ($category->parent_id == $categoryId){
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
