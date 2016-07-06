<?php
namespace frontend\controllers;

use yii;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Goods;
use common\models\GoodsCategory;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
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
                'pageSize' => 4,
            ],
        ]);

        return $this->render('index', [
            'category' => $category,
            'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
            'goodsDataProvider' => $goodsDataProvider,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Благодарим за обращение к нам. Мы ответим Вам как можно быстрее.');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка при отправке Вашего письма.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionGmap()
    {
        return $this->render('gmap');
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('успех', 'Проверьте Ваш  email для дальнейших инструкций');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('ошибка', 'Не возможно сбросить пароль по указанному email.');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {

            Yii::$app->session->setFlash('success', 'Новый пароль был успешно сохранен');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => ($activeId === $category->id) ? true : null,
                    'label' => $category->title,
                    'url' => Url::to(['/catalog/index', 'id' => $category->id]),
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

    protected function findModel($cat_id, $ucat_id, $code)
    {
        if (($model = Goods::findOne(['cat_id' => $cat_id, 'ucat_id' => $ucat_id, 'code' => $code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findUser($id){
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
