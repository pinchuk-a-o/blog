<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m230910_184755_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'catalog_id' => $this->integer(),
            'title' => $this->string(),
            'title_translit' => $this->string(),
            'text' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('article_author_id_index', '{{%article}}', 'author_id');
        $this->createIndex('article_catalog_id_index', '{{%article}}', 'catalog_id');

        $this->addForeignKey('article_author_id_user_id', '{{%article}}', 'author_id', '{{%user}}', 'id');
        $this->addForeignKey('article_catalog_id_catalog_id', '{{%article}}', 'catalog_id', '{{%catalog}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('article_author_id_category_id', '{{%article}}');
        $this->dropForeignKey('article_category_id_category_id', '{{%article}}');

        $this->dropTable('{{%article}}');
    }
}
