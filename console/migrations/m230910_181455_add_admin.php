<?php

use yii\db\Migration;

/**
 * Class m230910_181455_add_admin
 */
class m230910_181455_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('public.user', [
            'username' => 'pinchuk',
            'email' => 'pinchukao@yandex.ru',
            'status' => 10,
            'password_hash' => Yii::$app->security->generatePasswordHash(123),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => 'now()',
            'updated_at' => 'now()',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
