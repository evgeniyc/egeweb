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

		<?= Html::img(Url::home().'uploads/'.$model->img, ['class'=>'w-50 float-start pe-3 pb-3']) ?>
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

<?php
	Pjax::begin();
		echo Html::a('Pjax test',['element/pj','id'=>2]);
	Pjax::end();
?>