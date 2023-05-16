<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230408_062835_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
			'username' => $this->string(16),
			'password' => $this->string(60),
			'auth_key' => $this->string(32),
			'accessToken' => $this->string(32),
			'created_at' => $this->date(),
			'updated_at' => $this->date(),
			'status' => $this->string(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
