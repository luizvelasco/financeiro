<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


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
 *
 */
class Bill extends \yii\db\ActiveRecord
{
    const TYPE_RECEIVE = 1;
    const TYPE_PAY = 2;

    const STATUS_OPENED = 1;
    const STATUS_PAYED_RECEIVED = 2;

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
            [['category_id', 'type', 'date', 'description', 'amount'], 'required'],
            [['category_id', 'type', 'status'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['description'], 'string', 'max' => 60],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Categoria',
            'type' => 'Tipo',
            'date' => 'Data',
            'description' => 'Descrição',
            'amount' => 'Valor',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function isOpened () 
     {
        return (int) $this->status === static::STATUS_OPENED;
     }

     public function getTypeText(): string
     {
        return static::getTypeOptions()[$this->type];
     }

     public function getStatusText(): string
     {
        return static::getStatusOptions()[$this->status];
     }

     public static function getTypeOptions(): array 
     {
        return [
            static::TYPE_RECEIVE => 'Contas a Receber',
            static::TYPE_PAY => 'Contas a Pagar',
        ];
     }

     public static function getStatusOptions(): array 
     {
        return [
            static::STATUS_OPENED => 'Em aberto',
            static::STATUS_PAYED_RECEIVED => 'Pago/Recebido',
        ];
     }

     public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
