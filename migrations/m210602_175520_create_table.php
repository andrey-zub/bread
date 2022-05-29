<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%}}`.
 */
class m210602_175520_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $sql = 'CREATE TABLE tbl (id INT(11) auto_increment primary key, email varchar(255))';
      yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tbl}}');
    }
}
