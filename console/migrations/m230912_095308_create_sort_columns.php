<?php

use yii\db\Migration;

class m230912_095308_create_sort_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'sort', $this->tinyInteger()->null());
        $this->addColumn('{{%catalog}}', 'sort', $this->tinyInteger()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230912_095308_create_sort_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230912_095308_create_sort_columns cannot be reverted.\n";

        return false;
    }
    */
}
