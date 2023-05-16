<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'EgeWeb main page';
?>
<div class="site-index row">
	<div class="col-md-9">
		<h1 class="text-center mt-2">Some heder of main part</h1>
		<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
		<div class="row">
			<?php for ($i=0; $i<16; $i++): ?>
			<div class="col-sm-6 col-md-4 col-lg-3 g-2">
				<div class="card" style="width: 100%;">
					<img src="<?= Url::home() ?>img/webstudio.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<?php endfor; ?>
				
		</div>
	</div>
	<?= $this->render('_sidebar') ?>
</div>

   
