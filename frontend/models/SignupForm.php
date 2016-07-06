<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
            public $username;
            public $email;
            public $password;
            public $repeatpass;
            public $allow_to_save;
            public $in_code;
            public $surname;
            public $name;
            public $patronymic;
            public $phone;
            public $post_index;
            public $address;
            public $verifyCode;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'filter', 'filter' => 'trim'],
            [['username'], 'required'],
            [['username'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот Логин уже занят.'],
            [['username'], 'string', 'min' => 2, 'max' => 255],

            [['email'], 'filter', 'filter' => 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email уже занят.'],

            [['password'], 'required'],
            [['password'], 'string', 'min' => 6],
            [['repeatpass'], 'required'],
            [['repeatpass'], 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают"],

            [['surname','name','patronymic'], 'required'],
            [['surname','name','patronymic'], 'filter','filter' => 'trim'],

            [['address'], 'required'],
            [['address'], 'filter', 'filter' => 'trim'],

            [['phone'], 'required'],
            [['post_index'], 'required'],

            [['allow_to_save'], 'required', 'requiredValue' => 1, 'message' => 'Вам необходимо дать согласие на сохранение личных данных'],

            [['verifyCode'],'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'repeatpass' => 'Повторите пароль',
            'email' => 'Электронная почта',
            'in_code' => 'Внутренний код клиента',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'post_index' => 'Почтовый индекс',
            'allow_to_save' => 'Разрешаю сохранить мои персональные данные',
            'verifyCode' => 'Проверочный код',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if (!empty($this->in_code)) $user->in_code = $this->in_code;
            $user->surname = $this->surname;
            $user->name = $this->name;
            $user->patronymic = $this->patronymic;
            $user->address = $this->address;
            $user->phone = $this->phone;
            $user->post_index = $this->post_index;
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
}
