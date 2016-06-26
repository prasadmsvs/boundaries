<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property FeaturesHasPropertyTypes[] $featuresHasPropertyTypes
 * @property Features[] $features
 * @property PropertyTypesHasProperty[] $propertyTypesHasProperties
 * @property Property[] $properties
 */
class PropertyTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturesHasPropertyTypes()
    {
        return $this->hasMany(FeaturesHasPropertyTypes::className(), ['property_types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeatures()
    {
        return $this->hasMany(Features::className(), ['id' => 'features_id'])->viaTable('features_has_property_types', ['property_types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypesHasProperties()
    {
        return $this->hasMany(PropertyTypesHasProperty::className(), ['property_types_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['id' => 'property_id'])->viaTable('property_types_has_property', ['property_types_id' => 'id']);
    }
}
