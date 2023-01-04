<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bills}}`.
 */
class m230104_211330_create_bills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bills}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger(1)->notNull(),
            'date' => $this->date()->notNull(),
            'description' => $this->string(60)->notNull(),
            'amount' => $this->decimal(10,2)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bills}}');
    }
}
