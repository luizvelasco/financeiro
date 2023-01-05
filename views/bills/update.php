<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bill $model */

$this->title = 'Editando lançamento: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Lançamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="bill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
