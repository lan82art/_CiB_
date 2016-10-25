<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class ProfileUpdateForm extends Model
{
    public $email;
    public $in_code;
    public $surname;
    public $name;
    public $patronymic;
    public $birthday;
    public $phone;
    public $post_index;
    public $address;


    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function init()
    {
        $this->email = $this->_user->email;
        $this->in_code = $this->_user->in_code;
        $this->surname = $this->_user->surname;
        $this->birthday = $this->_user->birthday;
        $this->name = $this->_user->name;
        $this->patronymic = $this->_user->patronymic;
        $this->phone = $this->_user->phone;
        $this->post_index = $this->_user->post_index;
        $this->address = $this->_user->address;

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
            [['username'], 'string', 'min' => 2, 'max' => 255],


            [['email'], 'filter', 'filter' => 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email уже занят.'],*/

            [['surname', 'name', 'patronymic'], 'required'],
            [['surname', 'name', 'patronymic'], 'filter', 'filter' => 'trim'],

            [['in_code'], 'integer'],

            [['address'], 'required'],
            [['address'], 'filter', 'filter' => 'trim'],

            [['phone'], 'required'],
            [['post_index'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'in_code' => 'Внутренний код клиента',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'birthday' => 'День рождения',
            'post_index' => 'Почтовый индекс',
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            
            $user->in_code = $this->in_code;
            $user->surname = $this->surname;
            $user->birthday = $this->birthday;
            $user->name = $this->name;
            $user->patronymic = $this->patronymic;
            $user->phone = $this->phone;
            $user->post_index = $this->post_index;
            $user->address = $this->address;

            return $user->save(false);
        } else {
            return false;
        }
    }
}
