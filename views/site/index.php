<?php

/* @var $this yii\web\View */

$this->title = 'Boundaries';
?>
<div class="site-index">

    

    <div class="body-content boundaries-content-home">
        <h2>Properties</h2>
     <div class="row row-eq-height">
		<?php 
      $count = 0;
			foreach($properties as $property){
        if($count%3==0){?>
        </div><div class="row row-eq-height">
        <?php
        }
        $count++;
		?>
				<div class="col-lg-4">
            <div class="card shadow">
                <div>
                  <img class="card-img-top" src="<?php echo Yii::getAlias('@web')."/".$property["image"];?>" alt="">
                  <div class="card-text-over"><?php echo Yii::$app->formatter->asCurrency($property["price"],'&#8377;'); ?></div>
                </div>
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
</div>
