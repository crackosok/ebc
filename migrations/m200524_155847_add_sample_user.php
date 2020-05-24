<?php

use yii\db\Migration;

/**
 * Class m200524_155847_add_sample_user
 */
class m200524_155847_add_sample_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'ebc',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('EBCTestCase'),
            'access_token' => \Yii::$app->security->generateRandomString()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', [
            'username' => 'ebc',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('EBCTestCase'),
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200524_155847_add_sample_user cannot be reverted.\n";

        return false;
    }
    */
}
