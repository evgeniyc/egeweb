<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username Логин
 * @property string|null $password Пароль
 * @property string|null $auth_key
 * @property string|null $accessToken
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $status Статус
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    //const SCENARIO_LOGIN = 'login';
    //const SCENARIO_REGISTER = 'register';
/*
    public function scenarios()
    {
        return [
            //self::SCENARIO_DEFAULT => ['username', 'email', 'password', 'status'],
			//self::SCENARIO_LOGIN => ['username', 'password'],
            //self::SCENARIO_REGISTER => ['username', 'email', 'password'],
        ];
    }
	*/
	/**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
	
	/**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
	
	 /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
	
	public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
	
	/**
     * @return int|string current username
     */
    public function getUsername()
    {
        return $this->username;
    }
	
	/**
     * @return int|string current username
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
	
	public function validatePassword($password)
	{
		if (Yii::$app->getSecurity()->validatePassword($password, $this->password)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                //$this->auth_key = \Yii::$app->security->generateRandomString();
				$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
				$this->created_at = date('Y-m-d');
				$this->status = 'user';
			
            }
			else {
				$this->updated_at = date('Y-m-d');
				if($this->isAttributeChanged('password'))
					$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
			}
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['username'], 'string', 'max' => 16],
			[['username'], 'unique'],
            [['password'], 'string', 'max' => 60],
			[['email'], 'email'],
            [['auth_key', 'accessToken'], 'string', 'max' => 32],
            [['status'], 'in', 'range' => ['1', '2', '3']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
			'email' => 'email',
            'auth_key' => 'Auth Key',
            'accessToken' => 'Access Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Статус',
        ];
    }
}
