<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

?>
<?php Pjax::begin([
	'id' => 'pjax-chat',
	'formSelector' => '#chat-form',
	'enablePushState' => false,

]); ?>
<div id="chat" class="p-2">
		<h4>Chat</h4>
		<div class="chat-form">
			<?= LinkPager::widget(['pagination' => $pagination]) ?>
			<?php $form = ActiveForm::begin([
				'action' => 'chat/ccreate',
				'options' => [
					'id' => 'chat-form',
					'data-pjax' => 1,
					],
				]
			); ?>

			<?= $form->field($model, 'body')->textInput(['maxlength' => true])->label('Добавить сообщение') ?>

			<div class="form-group">
				<?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-secondary mt-1']) ?>
			</div>

			<?php ActiveForm::end(); ?>

		</div>
		<?php foreach ($posts as $post) : ?>
			<?php if (Yii::$app->user->id !== $post->owner) : ?>
					<strong class="username"><?= $post->user->username ?></strong>
					<time><?= $post->created ?></time>
			<?php else : ?>
					<time><?= $post->created ?></time>
					<strong class="username float-end">Me</strong>
			<?php endif; ?>
			
		<p><?= $post->body ?></p>
		<?php endforeach; ?>
		
		
	</div>
	<?php Pjax::end(); ?>