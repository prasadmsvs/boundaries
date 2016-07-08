<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
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
    
    <?= $form->field($model, 'lat')->textInput() ?>
    
    <?= $form->field($model, 'lon')->textInput() ?>
    
    <div id="googleMap" style="width:500px;height:380px;"></div>
        

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
