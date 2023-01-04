<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m230104_211308_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->batchInsert('{{%categories}}', ['name', 'created_at'], [
            ['Cartão de Crédito', new Expression ('Now()')],
            ['Lazer', new Expression ('Now()')],
            ['Moradia', new Expression ('Now()')],
            ['Supermercado', new Expression ('Now()')],
            ['Veículo', new Expression ('Now()')],
            ['Salário', new Expression ('Now()')],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
