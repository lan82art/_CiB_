<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class ProfileupdateForm extends Model
{
    public $email;

    /*public $in_code;
    public $surname;
    public $birthday;
    public $name;
    public $patronymic;
    public $phone;
    public $post_index;
    public $address;
    */
    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function init()
    {
        $this->email = $this->_user->email;
        parent::init();
    }

    public function rules()
    {
        return [

            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => 'Этот email уже занят.',
                'filter' => ['<>', 'id', $this->_user->id],
            ],
            ['email', 'string', 'max' => 255],

        /*
            [['username'], 'filter', 'filter' => 'trim'],
            [['username'], 'required'],
            [['username'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот Логин уже занят.'],
            [['username'], 'string', 'min' => 2, 'max' => 255],*/
/*
            [['email'], 'filter', 'filter' => 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email уже занят.'],
/**/
 /*
 *
            [['surname', 'name', 'patronymic'], 'required'],
            [['surname', 'name', 'patronymic'], 'filter', 'filter' => 'trim'],

            [['in_code'], 'integer'],

            [['address'], 'required'],
            [['address'], 'filter', 'filter' => 'trim'],

            [['phone'], 'required'],
            [['post_index'], 'required'],*/
        ];
    }

    /*public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'in_code' => 'Внутренний код клиента',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'post_index' => 'Почтовый индекс',
        ];
    }*/

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            return $user->save();
        } else {
            return false;
        }
    }
}
