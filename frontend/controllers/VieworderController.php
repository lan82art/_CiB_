<?php
namespace frontend\controllers;

use common\models\User;
use frontend\models\ViewOrder;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii;

class VieworderController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $user_id = $this->findModel()->id;
         
        return $this->render('index', [
            'model' => $this->findModel(),
            'id' => $user_id
        ]);
    }
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}