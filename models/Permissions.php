<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permissions".
 *
 * @property integer $id
 * @property string $permission
 *
 * @property UserTypesHasPermissions[] $userTypesHasPermissions
 * @property UserTypes[] $userTypes
 */
class Permissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'permission'], 'required'],
            [['id'], 'integer'],
            [['permission'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permission' => 'Permission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypesHasPermissions()
    {
        return $this->hasMany(UserTypesHasPermissions::className(), ['permissions_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes()
    {
        return $this->hasMany(UserTypes::className(), ['id' => 'user_types_id'])->viaTable('user_types_has_permissions', ['permissions_id' => 'id']);
    }
}
