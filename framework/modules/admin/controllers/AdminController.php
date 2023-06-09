<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\models\LoginForm;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller
{
    
    public $layout = 'main';
	
	/**
     * Renders the index view for the module
     * @return string
     */
	public function actionIndex()
    {
        
		if (Yii::$app->user->isGuest) {
			return $this->redirect('admin/login');
        }
		
		return $this->render('index');
    }
	
	public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('index');
			//return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
			//return $this->goBack();
        }

        $model->password = '';
		$this->layout = 'main-login';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
