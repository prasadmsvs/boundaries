<?php

namespace app\models;

<<<<<<< HEAD
class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
=======
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string $address
 * @property integer $user_types_id
 *
 * @property Property[] $properties
 * @property UserTypes $userTypes
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
>>>>>>> 1b28fc00743f6bc01e2ce57be8940e1a269bc69e
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function getId()
    {
        return $this->id;
=======
    public function rules()
    {
        return [
            [['id', 'password', 'email', 'user_types_id'], 'required'],
            [['id', 'user_types_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['password', 'email', 'address'], 'string', 'max' => 225],
            [['email'], 'unique'],
            [['user_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTypes::className(), 'targetAttribute' => ['user_types_id' => 'id']],
        ];
>>>>>>> 1b28fc00743f6bc01e2ce57be8940e1a269bc69e
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
=======
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'email' => 'Email',
            'address' => 'Address',
            'user_types_id' => 'User Types ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_types_id']);
>>>>>>> 1b28fc00743f6bc01e2ce57be8940e1a269bc69e
    }
}
