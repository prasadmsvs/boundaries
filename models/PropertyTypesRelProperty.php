<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_types_has_property".
 *
 * @property integer $property_types_id
 * @property integer $property_id
 *
 * @property PropertyTypes $propertyTypes
 * @property Property $property
 */
class PropertyTypesRelProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_types_has_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_types_id', 'property_id'], 'required'],
            [['property_types_id', 'property_id'], 'integer'],
            [['property_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyTypes::className(), 'targetAttribute' => ['property_types_id' => 'id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'property_types_id' => 'Property Types ID',
            'property_id' => 'Property ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypes()
    {
        return $this->hasOne(PropertyTypes::className(), ['id' => 'property_types_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }
}
