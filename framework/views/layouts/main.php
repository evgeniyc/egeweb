<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\ElementSearch;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
	
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="main-cont" class="container g-0 d-flex flex-column h-100">
<header id="header">
<nav id="main-nav">
	<div class="container g-0">
		<div class="d-flex">
			<div id="brand-img" class="d-flex align-items-center">
				<a class="navbar-brand" href="<?= Url::home() ?>">
					<img src="<?= Url::home() ?>img/logo5.png" alt="Logo" class="pt-1" width="160px">
				</a>
			</div>
			<div class="d-flex flex-grow-1 flex-column">
					<div class="row g-0">
						<div class="col-12 col-lg-8 text-center"><h1 class="m-0"><i><?= Yii::t('app', 'EgeWeb web make studio') ?></i></h1></div>
						<div class="col-12 col-lg-4 g-0">
							<?php $model = new ElementSearch(); 
							$form = ActiveForm::begin([
								'action' => ['element1/index'],
								'method' => 'get',
								'id' => 'main-search',
								
								'options' => [
									'role' => 'search',
									'class' => 'input-group mx-auto pt-2 pe-lg-2',
								],
								'fieldConfig' => [
									'options' => [
										'tag' => false,
									]
								],
								]
							); ?>

								<?= $form->field($model, 'title',
									[
										'inputOptions' => [
											'class' => 'form-control me-2 py-1 fs-6',
											'type' => 'search',
											'placeholder' => Yii::t('app', 'Search'),
											'aria-label' => 'Search',
											'maxlength' => true,
										],
										'template' => "{input}\n{hint}\n{error}",
									]
								) ?>
								<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-secondary py-1 fs-6']) ?>
							<?php ActiveForm::end(); ?>
						</div>
					</div>
				
				<div id="nav-menu" class="d-flex justify-content-around">
					<nav id="main-nav-menu" class="nav d-none d-lg-flex">
					  <a class="nav-link" aria-current="page" href="<?= Url::home() ?>"><i class="bi bi-house"></i> <?= Yii::t('app', 'Home') ?></a>
					  <a class="nav-link" href="<?= Url::toRoute('site/about') ?>"><i class="bi bi-file-earmark-person"></i> <?= Yii::t('app', 'About') ?></a>
					  <a class="nav-link" href="<?= Url::toRoute('site/contact') ?>"><i class="bi bi-person-lines-fill"></i> <?= Yii::t('app', 'Contacts') ?></a>
					  <a class="nav-link" aria-current="page" href="<?= Url::home().'element/index' ?>"><i class="bi bi-projector"></i> <?= Yii::t('app', 'Our projects') ?></a>
					  <a id="pjax-link" class="nav-link" aria-current="page" data-pjax  href="<?= Url::to(['pjax/index']) ?>"><i class="bi bi-fast-forward"></i> Pjax</a>
					<?php if(Yii::$app->user->isGuest) : ?>
						<a class="nav-link" href="<?= Url::toRoute('site/login') ?>"><i class="bi bi-box-arrow-in-right"></i> <?= Yii::t('app', 'Login') ?></a>
					<?php else : 
						echo Html::beginForm(['/site/logout'])
						. Html::submitButton(Yii::t('app', '<i class="bi bi-box-arrow-left"></i> Logout') . ' (' . Yii::$app->user->identity->username . ')',
							['class' => 'nav-link logout']
						)
						. Html::endForm(); ?>
					<?php endif; ?>
					</nav>
					<div id="toggler" class="d-block d-lg-none fs-4"><i class="bi bi-list"><?= Yii::t('app', 'Menu') ?></i></div>

				</div>
			</div>
			<div id="header-contact" class="text-center d-none d-lg-block px-3 fst-italic">
				<h4 class="m-0"><?= Yii::t('app', 'Contacts') ?>:</h3>
				<div class="cont-row"><i class="bi bi-phone"></i>: 7589483629</div>
				<div class="cont-row"><i class="bi bi-phone-fill"></i>: 1234567890</div>
				<div id="lang-icons" class="align-self-end">
					<a href="<?= Url::to(['site/switch','lang'=>'uk-UA']) ?>" class="icon_lg"><?= Html::img(Url::home().'img/ukr.png',['width'=>'24'])?></a>
					<a href="<?= Url::to(['site/switch','lang'=>'en-US']) ?>" class="icon_lg"><?= Html::img(Url::home().'img/usa.png',['width'=>'24'])?></a>
					<a href="<?= Url::to(['site/switch','lang'=>'ru-RU']) ?>" class="icon_lg"><?= Html::img(Url::home().'img/ru.png',['width'=>'24'])?></a>
					<?= Yii::$app->language ?>
				</div>
			</div>
		</div>
	</div>
</nav>

</header>

<main id="main" class="overflow-auto" role="main">
    
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'], 'options'=>['class'=>'p-2']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
		<div class="container">
			<?= $content ?>
		</div>
    
</main>

<footer id="footer" class="py-3">
    <div class="d-flex justify-content-center"><div class="text-center bg-primary text-wrap" style="width: 10rem;">EgeWeb &copy; <?= date('Y') ?></div></div>
</footer>
</div>
<div id="social">
<?= Html::img(Url::home().'img/social/Facebook.svg',['width' => '35px']) ?><br/>
<?= Html::img(Url::home().'img/social/Instagram.svg',['width' => '35px']) ?><br/>
<?= Html::img(Url::home().'img/social/Twitter.svg',['width' => '35px']) ?><br/>
<?= Html::img(Url::home().'img/social/Pinterest.svg',['width' => '35px']) ?><br/>
<?= Html::img(Url::home().'img/social/YouTube.svg',['width' => '35px']) ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
