<?php
namespace app\components;
use app\models\Chat;
use yii\base\Widget;
use yii\data\Pagination;

class ChatWidget extends Widget
{
    public function init()
    {
        parent::init();
        
    }

    public function run()
    {
        $model = new Chat();
		// build a DB query to get all articles with status = 1
		$query = Chat::find();

		// get the total number of articles (but do not fetch the article data yet)
		$count = $query->count();

		// create a pagination object with the total count
		$pagination = new Pagination([
			'totalCount' => $count,
			'pageSize' => 10,

		]);

// limit the query using the pagination and retrieve the articles
$posts = $query->offset($pagination->offset)
    ->limit($pagination->limit)
	->orderBy('created DESC')
    ->all();
		return $this->render('chat', ['model' => $model, 'posts' => $posts, 'pagination' => $pagination]); 
    }
}