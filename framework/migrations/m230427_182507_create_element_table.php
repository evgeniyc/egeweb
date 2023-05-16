<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%element}}`.
 */
class m230427_182507_create_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%element}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'img' => $this->string(24),
            'descr' => $this->string(),
            'body' => $this->text(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
            'cat' => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%element}}');
    }
}
