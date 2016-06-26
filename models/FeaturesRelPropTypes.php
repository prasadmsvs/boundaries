<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "features_has_property_types".
 *
 * @property integer $features_id
 * @property integer $property_types_id
 *
 * @property Features $features
 * @property PropertyTypes $propertyTypes
 */
class FeaturesRelPropTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'features_has_property_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['features_id', 'property_types_id'], 'required'],
            [['features_id', 'property_types_id'], 'integer'],
            [['features_id'], 'exist', 'skipOnError' => true, 'targetClass' => Features::className(), 'targetAttribute' => ['features_id' => 'id']],
            [['property_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyTypes::className(), 'targetAttribute' => ['property_types_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'features_id' => 'Features ID',
            'property_types_id' => 'Property Types ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeatures()
    {
        return $this->hasOne(Features::className(), ['id' => 'features_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypes()
    {
        return $this->hasOne(PropertyTypes::className(), ['id' => 'property_types_id']);
    }
}
