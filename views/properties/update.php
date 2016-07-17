<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $areamodel app\models\Area */
/* @var $bedroomsmoel app\models\Bedrooms */
/* @var $property_typesmodel app\models\propertyTypes */

$this->title = 'Update Property: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'areamodel' => $areamodel,
        'bedroomsmodel' => $bedroomsmodel,
        'property_typesmodel' => $property_typesmodel
    ]) ?>

</div>
