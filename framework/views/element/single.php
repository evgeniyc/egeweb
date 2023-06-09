<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Element';
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="element-single">

    <h1 class="text-center mb-3"><?= Html::encode($model->title) ?></h1>
	
	
	<div id="carouselExampleIndicators" class="carousel slide w-50 float-start me-2">
	  <div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	  </div>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="<?= Url::home().'img/phon1.jpg' ?>" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
		  <img src="<?= Url::home().'img/phon2.jpg' ?>" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
		  <img src="<?= Url::home().'img/phon3.jpg' ?>" class="d-block w-100" alt="...">
		</div>
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>

		<?php Html::img(Url::home().'uploads/'.$model->img, ['class'=>'w-50 float-start pe-3 pb-3']) ?>
		<?= HtmlPurifier::process($model->body) ?>
	
</div>
<div class="clearfix"></div>

<div class="element-view">

    <h1>Properties</h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'img',
            'descr',
            'body:ntext',
            'created_at',
            'updated_at',
            'cat',
        ],
    ]) ?>

</div>