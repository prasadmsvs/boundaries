<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $areamodel app\models\Area */
/* @var $bedroomsmoel app\models\Bedrooms */
/* @var $property_typesmodel app\models\propertyTypes */

$this->title = 'Create Property';
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'areamodel' => $areamodel,
        'bedroomsmodel' => $bedroomsmodel,
        'property_typesmodel' => $property_typesmodel
    ]) ?>

</div>
