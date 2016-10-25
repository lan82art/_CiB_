<?php
namespace frontend\controllers;

use common\models\Order;
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
        $user = $this->findModel();
        $user_id = $user->id;
         
        return $this->render('index', [
            'model' => $this->findOrders($user_id),
        ]);
    }
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
    private  function findOrders($user_id)
    {
        return Order::find()->where('user_id ='.$user_id)->all();
    }
}