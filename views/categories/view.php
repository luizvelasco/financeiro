<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Category $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja apagar esta categoria?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

<div class="list-group">
        <?php foreach ($model->bill as $bills): ?>
            <?php $color = ($bills->type === 1 ? 'success' : 'danger') ?>
            <a href="<?= Url::to(['bills/update', 'id' => $bills->id]) ?>" class="list-group-item-<?= $color ?>">
                <h4 class="list-group-item-heading"><?= $bills->description ?></h4>
                <p class="list-group-item-text">
                    <?= $bills->date ?> | R$ <?= $bills->amount ?>
                </p>
            </a>

        <?php endforeach; ?>

    </div>


</div>