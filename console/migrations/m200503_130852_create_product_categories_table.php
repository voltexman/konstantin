<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_categories}}`.
 */
class m200503_130852_create_product_categories_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%product_categories}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'name' => $this->string()->notNull(),
            'text' => $this->text(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->string(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product_categories}}');
    }
}
