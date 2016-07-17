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
            <div class="card">
                <img class="card-img-top img-responsive" src="<?php echo Yii::getAlias('@web')."/".$property["image"];?>" alt="">
                <div class="card-block">
                  <h4 class="card-title"><a href="<?php echo Yii::$app->getHomeUrl()."properties/".$property["id"]?>"><?php echo $property["name"];?></a></h4>
                  <p class="card-text"><?php echo $property["description"];?></p>
                </div>
            </div>
        </div>
		<?php
			}
		?>
	</div>
