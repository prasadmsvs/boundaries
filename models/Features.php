<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "features".
 *
 * @property integer $id
 * @property string $feature
 * @property string $description
 *
 * @property FeaturesHasPropertyTypes[] $featuresHasPropertyTypes
 * @property PropertyTypes[] $propertyTypes
 */
class Features extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'features';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['feature', 'description'], 'string', 'max' => 255],
            [['feature'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature' => 'Feature',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturesHasPropertyTypes()
    {
        return $this->hasMany(FeaturesHasPropertyTypes::className(), ['features_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypes()
    {
        return $this->hasMany(PropertyTypes::className(), ['id' => 'property_types_id'])->viaTable('features_has_property_types', ['features_id' => 'id']);
    }
}
