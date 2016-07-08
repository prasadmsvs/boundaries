<?php

/* @var $this yii\web\View */

$this->title = 'Boundaries';
?>
<div class="site-index">

    <div class="jumbotron bound-leadspace">

    </div>

    <div class="body-content boundaries-content-home">

        <div class="row">
		<?php 
			foreach($properties as $property){
		?>
				<div class="col-lg-4">
					<h2><?php echo $property["name"];?></h2>
					<p><?php echo $property["description"];?></p>
					<img class="img-responsive" src="<?php echo Yii::getAlias('@web')."/".$property["image"];?>" />
				</div>
		<?php
			}
		?>
	</div>
</div>
