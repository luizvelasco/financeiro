<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Bill $model */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Lançamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja excluir este lançamento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name
            ],
            [
                'attribute' => 'type',
                'value' => $model->getTypeText()
            ],
            'date:date',
            'description',
            'amount:currency',
            [
                'attribute' => 'status',
                'value' => $model->getStatusText()
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
