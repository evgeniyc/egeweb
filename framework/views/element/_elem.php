<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="card w-100 text-center">
	<img src="../uploads/<?= $model->img ?>" class="card-img-top" alt="Image">
	<div class="card-body">
		<h5 class="card-title text-start"><?= Html::encode($model->title) ?></h5>
		<p class="card-text"><?= Html::encode($model->descr) ?></p>
		<a href="<?= Url::to(['element/view','id'=>$model->id]) ?>" class="btn btn-primary">Details</a>
	</div>
</div>