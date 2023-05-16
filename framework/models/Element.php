<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "element".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string|null $img Изображение
 * @property string|null $descr Описание
 * @property string|null $body Текст
 * @property string|null $created_at Создано
 * @property string|null $updated_at Обновлено
 * @property int|null $cat Категория
 */
class Element extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['cat'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['img'], 'string', 'max' => 40],
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['descr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'img' => 'Изображение',
			'imageFile' => 'Файл',
            'descr' => 'Описание',
            'body' => 'Текст',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'cat' => 'Категория',
        ];
    }
	
	public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
			return true;
        } else {
            return false;
        }
    }
	
	public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_at = date('Y-m-d');
			}
			else {
				$this->updated_at = date('Y-m-d');
			}
            return true;
        }
        return false;
    }
}
