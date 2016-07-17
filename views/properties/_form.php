<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $areamodel app\models\Area */
/* @var $bedroomsmodel app\models\Bedrooms */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyBH1gIsDQZvNAcp1At-3MfNfjpuihPVXiQ');
$this->registerJsFile(Yii::getAlias('@web')."/js/boundaries.js");
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'file')->fileInput() ?>
	
    <?= $form->field($model, 'price')->textInput() ?>
    
    <?= $form->field($model, 'lat')->hiddenInput()->label(FALSE) ?>
    
    <?= $form->field($model, 'lon')->hiddenInput()->label(FALSE) ?>
    
    <div id="googleMap" style="width:500px;height:380px;"></div>
    
    <?= $form->field($areamodel, 'length')->textInput() ?>
    
    <?= $form->field($areamodel, 'width')->textInput() ?>
    
    <?= $form->field($bedroomsmodel,'no_of_bedrooms' )->textInput() ?>
    
        

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
