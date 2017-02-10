<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_password_history`.
 */
class m170210_124713_create_user_password_history_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_password_history', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11)->unsigned(),
            'created_by' => $this->integer(11)->unsigned(),
            'old_password' => $this->string(64)->notNull(),
        ]);

        $this->createIndex('key_created_by', 'user_password_history', 'created_by');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_password_history');
    }
}
