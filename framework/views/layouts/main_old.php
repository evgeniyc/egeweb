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

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
	
	<?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class="container">
<header id="header">
    <?php /*
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
		'brandImage' => './img/brand1.png',
        'options' => ['class' => 'navbar-expand-md bg-body-tertiary', 'id'=> 'main-nav']
    ]); ?>
	
	<div id="nav-search" class="text-center">
		<form class="d-flex" role="search">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
		</form>
		<?php echo Nav::widget([
			'options' => ['class' => 'navbar-nav'],
			'items' => [
				['label' => 'Home', 'url' => ['/site/index']],
				['label' => 'About', 'url' => ['/site/about']],
				['label' => 'Contact', 'url' => ['/site/contact']],
				Yii::$app->user->isGuest
					? ['label' => 'Login', 'url' => ['/site/login']]
					: '<li class="nav-item">'
						. Html::beginForm(['/site/logout'])
						. Html::submitButton(
							'Logout (' . Yii::$app->user->identity->username . ')',
							['class' => 'nav-link btn btn-link logout']
						)
						. Html::endForm()
						. '</li>'
			]
		]); */?>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="./img/brand1.png" alt="Logo" class="d-inline-block align-text-top">
				
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Dropdown
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Another action</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="#">Something else here</a></li>
				  </ul>
				</li>
				<li class="nav-item">
				  <a class="nav-link disabled">Disabled</a>
				</li>
			  </ul>
			  
			  <form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			  </form>
			  <div id="header-contact" class="text-center">
				<h3>Contacts:</h3>
				<i class="bi bi-phone-vibrate"></i> ph 1: 7589483629 <br>
				<i class="bi bi-phone-vibrate"></i> ph 2: 1234567890 <br>
				<i class="bi bi-phone-vibrate"></i> ph 3: 0987654322
				<div id="lang-icons">
			<a href="<?= Url::to(['site/switch']) ?>" class="icon_lg"><?= Html::img('./img/ukr.png',['width'=>'24'])?></a>
			<a href="<?= Url::to(['site/switch']) ?>" class="icon_lg"><?= Html::img('./img/usa.png',['width'=>'24'])?></a>
		</div>
			</div>
			
			</div>
		  </div>
		</nav>

	<!--	
		<div id="lang-icons">
			<a href="<?= Url::to(['site/switch']) ?>" class="icon_lg"><?= Html::img('../img/ukr.png',['width'=>'24'])?></a>
			<a href="<?= Url::to(['site/switch']) ?>" class="icon_lg"><?= Html::img('../img/usa.png',['width'=>'24'])?></a>
		</div>
	</div>
	
	<div id="header-contact" class="text-center">
		<h3>Contacts:</h3>
		<i class="bi bi-phone-vibrate"></i> ph 1: 7589483629 <br>
		<i class="bi bi-phone-vibrate"></i> ph 2: 1234567890 <br>
		<i class="bi bi-phone-vibrate"></i> ph 3: 0987654322
	</div> -->
   <?php //NavBar::end(); ?>
</header>

<main id="main" class="flex-shrink-0 h-100" role="main">
    
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    
</main>

<footer id="footer" class="mt-auto py-1 bg-light">
   
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
           
        </div>
    
</footer>
</div>
 
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
