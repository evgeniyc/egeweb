<?php
use app\models\Chat;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\components\ChatWidget;

$model = new Chat();
$posts = Chat::find()
    ->orderBy('created DESC')
    ->all();
?>
<div id="sidebar" class="col-md-3">
	<h4 class="mt-3">Some header of Sidebar</h4>
	<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
	<hr>
	<?= ChatWidget::widget() ?>
</div>

