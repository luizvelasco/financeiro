<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bills}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $type
 * @property string $date
 * @property string $description
 * @property float $amount
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bills}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'type', 'date', 'description', 'amount', 'created_at'], 'required'],
            [['category_id', 'type', 'status'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['description'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'type' => 'Type',
            'date' => 'Date',
            'description' => 'Description',
            'amount' => 'Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
