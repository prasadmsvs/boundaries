<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_types".
 *
 * @property integer $id
 * @property string $type
 *
 * @property User[] $users
 * @property UserTypesHasPermissions[] $userTypesHasPermissions
 * @property Permissions[] $permissions
 */
class UserTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 45],
            [['type'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypesHasPermissions()
    {
        return $this->hasMany(UserTypesHasPermissions::className(), ['user_types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        return $this->hasMany(Permissions::className(), ['id' => 'permissions_id'])->viaTable('user_types_has_permissions', ['user_types_id' => 'id']);
    }
}
