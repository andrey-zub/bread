<?php

use yii\db\Migration;

/**
 * Class m210602_190642_update_table
 */
class m210602_190642_update_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $sql = 'ALTER TABLE tbl MODIFY test varchar(255)';
      yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

      $sql = 'ALTER TABLE tbl MODIFY test int';
      yii::$app->db->createCommand($sql)->execute();

        echo "m210602_190642_update_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210602_190642_update_table cannot be reverted.\n";

        return false;
    }
    */
}
