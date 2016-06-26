<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_types_has_permissions".
 *
 * @property integer $user_types_id
 * @property integer $permissions_id
 *
 * @property UserTypes $userTypes
 * @property Permissions $permissions
 */
class UserTypesRelPermissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_types_has_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_types_id', 'permissions_id'], 'required'],
            [['user_types_id', 'permissions_id'], 'integer'],
            [['user_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTypes::className(), 'targetAttribute' => ['user_types_id' => 'id']],
            [['permissions_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permissions::className(), 'targetAttribute' => ['permissions_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_types_id' => 'User Types ID',
            'permissions_id' => 'Permissions ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_types_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        return $this->hasOne(Permissions::className(), ['id' => 'permissions_id']);
    }
}
