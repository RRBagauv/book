<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userbook}}`.
 */
class m210501_113228_create_userbook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userbook}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'get'=> $this->integer(2)->notNull()
        ]);

        $this->createIndex(
            'idx-userbook-user_id',
            'userbook',
            'user_id'
        );

        $this->addForeignKey(
            'fk-userbook-user_id',
            'userbook',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-userbook_book_id',
            'userbook',
            'book_id'
        );

        $this->addForeignKey(
            'fk-userbook_book_id',
            'userbook',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userbook}}');
    }
}
