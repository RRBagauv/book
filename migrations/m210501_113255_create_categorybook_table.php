<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categorybook}}`.
 */
class m210501_113255_create_categorybook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categorybook}}', [
            'id' => $this->primaryKey(),
            'book_id' =>$this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-categorybook-category_id',
            'categorybook',
            'category_id'
        );

        $this->addForeignKey(
            'fk-categorybook-category_id',
            'categorybook',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-categorybook-book_id',
            'categorybook',
            'book_id'
        );

        $this->addForeignKey(
            'fk-categorybook-book_id',
            'categorybook',
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
        $this->dropTable('{{%categorybook}}');
    }
}
