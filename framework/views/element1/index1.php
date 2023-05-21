<?php

use app\models\Element;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Our projects');
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="element-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
	<div class="elem">
	<h3>Результаты поиска:</h3>
		<?= 
			ListView::widget([
				'dataProvider' => $dataProvider,
				'itemView' => '_elem',
				'options' => ['class'=>'row pb-2'],
				'itemOptions' => ['class'=>'col-sm-6 col-md-4 col-lg-3 g-2 d-flex align-items-stretch'],
				//'summary' => 'Statistics: begin: {begin}, end: {end}, count: {count}, totalCount: {totalCount}, page: {page}, pageCount: {pageCount}',
			]); ?>
	</div>
	
</div>

