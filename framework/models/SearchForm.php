<?php
namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $title;
    

    public function rules()
    {
        return [
            [['title'],  'required'],
			[['title'], 'string', 'max'=>64],
        ];
    }
}