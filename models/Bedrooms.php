<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bedrooms".
 *
 * @property integer $id
 * @property string $no_of_bedrooms
 * @property integer $property_id
 *
 * @property Property $property
 */
class Bedrooms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bedrooms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_id'], 'required'],
            [['id', 'property_id'], 'integer'],
            [['no_of_bedrooms'], 'string', 'max' => 45],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_of_bedrooms' => 'No Of Bedrooms',
            'property_id' => 'Property ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }
}
