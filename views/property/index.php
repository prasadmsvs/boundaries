<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Properties</h1>
<ul>
<?php foreach ($properties as $property): ?>
    <li>
        <?= Html::encode("{$property->name} ({$property->location})") ?>:
        <?= $property->user ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>