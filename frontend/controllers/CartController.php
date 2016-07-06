<?php

namespace frontend\controllers;

use yii;
use common\models\Order;
use common\models\OrderItems;
use common\models\Goods;

class CartController extends \yii\web\Controller
{
    //public function actionAdd($code, $cat_id, $ucat_id)
    /*@var */
    public function actionAdd($id)
    {
        $product = Goods::findOne($id);
        if ($product) {
            \Yii::$app->cart->put($product);
            if (Yii::$app->request->isPjax) {
                return $this->renderPartial('_success', [
                    'id' => $id,
                ]);
            }
            else {
                return $this->goBack();
            }
        }
    }

    public function actionIndex()
    {
        $cart = \Yii::$app->cart;

        $products = $cart->getPositions();
        $total = $cart->getCost();

        return $this->render('index', [
           'products' => $products,
           'total' => $total,
        ]);
    }

    public  function actionClear(){

        \Yii::$app->cart->removeAll();
        $this->redirect(['cart/index']);
    }

    public function actionRemove($id)
    {
        $product = Goods::findOne($id);
        if ($product) {
            \Yii::$app->cart->remove($product);
            $this->redirect(['cart/index']);
        }
    }

    public function actionUpdate($id, $quantity)
    {
        $product = Goods::findOne($id);
        if ($product) {
            \Yii::$app->cart->update($product, $quantity);
            $this->redirect(['cart/index']);
        }
    }

    public function actionOrder()
    {
        $order = new Order();

        $cart = \Yii::$app->cart;

        /* @var $products Goods[] */
        $products = $cart->getPositions();
        $total = $cart->getCost();

        if ($order->load(\Yii::$app->request->post()) && $order->validate()) {

            $order->amount = $total;
            $order->user_id = Yii::$app->user->id;
            $transaction = $order->getDb()->beginTransaction();
            $order->save(false);

            foreach($products as $product) {
                $orderItem = new OrderItems();
                $orderItem->order_id = $order->id;
                $orderItem->title = $product->title;
                $orderItem->price = $product->getPrice();
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->getQuantity();
                $orderItem->goods_cat_id = $product->cat_id;
                $orderItem->goods_ucat_id = $product->ucat_id;
                $orderItem->goods_code = $product->code;
                if (!$orderItem->save(false)) {
                    $transaction->rollBack();
                    \Yii::$app->session->addFlash('error', 'Невозможно разместить Ваш заказ. Пожалуйста свяжитесь с нами.');
                    return $this->redirect('catalog/index');
                }
            }
            $transaction->commit();
            \Yii::$app->cart->removeAll();

            \Yii::$app->session->addFlash('success', 'Благодарим за Ваш заказ.');
            //$order->sendEmail();

            return $this->redirect('../catalog/index');
        }

        return $this->render('save_order', [
            'order' => $order,
            'products' => $products,
            'total' => $total,
        ]);
    }
}