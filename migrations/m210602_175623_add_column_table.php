<?php

use yii\db\Migration;

/**
 * Class m210602_175623_add_column_table
 */
class m210602_175623_add_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $sql = 'ALTER TABLE tbl ADD test int';
      yii::$app->db->createCommand($sql)->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

      $sql = 'ALTER TABLE tbl DROP COLUMN test int';
      yii::$app->db->createCommand($sql)->execute();

        echo "m210602_175623_add_column_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210602_175623_add_column_table cannot be reverted.\n";

        return false;
    }
    */
}
