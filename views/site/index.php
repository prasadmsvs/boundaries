<?php

/* @var $this yii\web\View */

$this->title = 'Boundaries';
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">

    </div>

    <div class="body-content">

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
</div>
