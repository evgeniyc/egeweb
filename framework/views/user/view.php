<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'User with username "'.$model->username.'"';
$mess = Yii::$app->session->getFlash('regCompl');
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
	
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="text-success mb-2"><?= $mess ?></div>
		
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
			'username',
            'email',
            'created_at',
			'updated_at',
            'status',
        ],
    ]) ?>

</div>
