<?php

use yii\db\Migration;

/**
 * Class m230912_151337_create_short_text_column
 */
class m230912_151337_create_short_text_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'short_text', $this->text()->after('title_translit'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230912_151337_create_short_text_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230912_151337_create_short_text_column cannot be reverted.\n";

        return false;
    }
    */
}
