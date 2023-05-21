<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Element $model */

$this->title = Yii::t('app', 'Create Element');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Elements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
