<?php

namespace app\models;

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
 * @property string $authKey
 *
 * @property Property[] $properties
 * @property UserTypes $userTypes
 */
class BoundariesUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'password', 'email', 'user_types_id'], 'required'],
            [['id', 'user_types_id'], 'integer'],
            [['first_name', 'last_name', 'authKey'], 'string', 'max' => 45],
            [['password', 'email', 'address'], 'string', 'max' => 225],
            [['email'], 'unique'],
            [['user_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTypes::className(), 'targetAttribute' => ['user_types_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
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
            'authKey' => 'Auth Key',
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
    }
	
	public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
	
	/**
	* finds username
	*/
	public static function findByUsername($username)
	{
		return self::findOne(["email"=>$username]);
	}
	
	/**
	* validates password
	*/
	public function validatePassword($password)
	{
		return $this->password === $password;
	}
}
