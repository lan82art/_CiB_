<?php

namespace frontend\controllers;

use common\models\Articles;
use common\models\ArticlesCategory;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class ArticlesController extends \yii\web\Controller
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
        /** @var articlesCategory $category */
        $category = null;

        $categories = ArticlesCategory::find()->indexBy('id')->all();

        $articlesQuery = Articles::find()->orderBy('id desc');
        if ($id !== null && isset($categories[$id])) {
            $category = $categories[$id];
            $articlesQuery->where(['art_cat_id' => $this->getCategoryIds($categories, $id)]);
        }

        $articlesDataProvider = new ActiveDataProvider([
            'query' => $articlesQuery,
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('index', [
            'category' => $category,
            'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
            'articlesDataProvider' => $articlesDataProvider,
            'title' => $category->title,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * @param articlesCategory[] $categories
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
                    'url' => Url::to(['articles/index', 'id' => $category->id]),
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }

    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param articlesCategory[] $categories all categories
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
}
