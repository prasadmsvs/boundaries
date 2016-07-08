<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property string $name
 * @property integer $user
 * @property string $description
 *
 * @property User $user0
 * @property PropertyTypesHasProperty[] $propertyTypesHasProperties
 * @property PropertyTypes[] $propertyTypes
 */
class Property extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'user'], 'integer'],
            [['name'], 'string', 'max' => 225],
            [['description','image'], 'string', 'max' => 255],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => BoundariesUser::className(), 'targetAttribute' => ['user' => 'id']],
            [['price'], 'integer'],
            [['file'],'file'],
            [['lat','lon'],'number']
          
        ];
    }

	/**
	* Gets all properties
	*/
	public function getProperties(){
		$properties_result = Property::find()
		->indexBy('id')
		->all();
		$properties = array();
		foreach($properties_result as $property){
                    array_push(
                        $properties,
                        array(
                                "name"=>$property->name,
                                "description"=>$property->description,
                                "image"=>$property->image
                                )
                    );
		}
		return $properties;
	}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user' => 'User',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(BoundariesUser::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypesHasProperties()
    {
        return $this->hasMany(PropertyTypesHasProperty::className(), ['property_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTypes()
    {
        return $this->hasMany(PropertyTypes::className(), ['id' => 'property_types_id'])->viaTable('property_types_has_property', ['property_id' => 'id']);
    }
}
