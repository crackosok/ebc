<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%divide_result}}'.
 */
class m200524_151658_create_divide_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%divide_result}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'result' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%divide_result}}');
    }
}
