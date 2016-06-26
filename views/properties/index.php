<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PropertiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	 <div class="row">
		<?php 
			foreach($properties as $property){
		?>
				<div class="col-lg-4">
					<h2><?php echo $property["name"];?></h2>
					<p><?php echo $property["description"];?></p>
				</div>
		<?php
			}
		?>
	</div>
