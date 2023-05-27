<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property string|null $body Содержание
 * @property string|null $created Создано
 * @property int|null $owner Владелец
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created'], 'safe'],
            [['owner'], 'integer'],
            [['body'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'body' => Yii::t('app', 'Содержание'),
            'created' => Yii::t('app', 'Создано'),
            'owner' => Yii::t('app', 'Владелец'),
        ];
    }
	
	public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'owner']);
    }
	
	public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created = date('Y-m-d H:i:s');
				$this->owner = Yii::$app->user->id;
            }
			return true;
        }
        return false;
    }
}
