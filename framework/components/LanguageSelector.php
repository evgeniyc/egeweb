<?php
namespace app\components;
use Yii;
use yii\base\BootstrapInterface;
use yii\web\Session;


class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
		$session = Yii::$app->session;
		$session->open();
		if($session->has('language'))  
			$app->language = $session->get('language');
		else
			$app->language = $preferredLanguage;
		$session->close();
    }
}
?>