<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m200506_160911_create_products_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%products}}');
    }
}
