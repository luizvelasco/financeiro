<?php

use yii\db\Migration;
use yii\db\Expression;

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

        $this->batchInsert('{{%bills}}', ['category_id', 'type', 'date', 'description', 'amount', 'created_at'], [
            //Salario
            [6, 1, '2022-01-01', 'Salário', 3000, new Expression ('Now()')],
            [6, 1, '2022-01-02', 'Salário Esposa', 3000, new Expression ('Now()')],

             //Cartão de Crédito
             [1, 2, '2022-01-01', 'Joystick do Playstation', -250, new Expression ('Now()')],
             [1, 2, '2022-01-02', 'Monitor Led 23', -679.90, new Expression ('Now()')],
             [1, 2, '2022-01-02', 'Mousepad Leadership', -2.50, new Expression ('Now()')],

             //Lazer
             [2, 2, '2022-01-01', 'Academia', -70, new Expression ('Now()')],
             [2, 2, '2022-01-02', 'Netflix', -21.90, new Expression ('Now()')],

             //Moradia
             [3, 2, '2022-01-01', 'Condomínio', -300, new Expression ('Now()')],

             //Supermercado
             [4, 2, '2022-01-01', 'Compras da quinzena', -224.54, new Expression ('Now()')],

             //Veículo
             [5, 2, '2022-01-01', 'Troca de óleo', -100, new Expression ('Now()')],
             [5, 2, '2022-01-02', 'combustível', -80, new Expression ('Now()')],
             [5, 2, '2022-01-02', 'Lava Jato', -50, new Expression ('Now()')],
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
