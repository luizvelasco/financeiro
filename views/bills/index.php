<?php

use app\models\Bill;
use app\models\Category;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BillSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Bills $model */
/** @var app\models\Category $model */

$this->title = 'Lançamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Lançamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'date',
                'format' => 'date',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'description',
            [
                'attribute' => 'category_id',
                'filter' => Category::getOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 145px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    return $model->category->name;
                } 
            ],
            [
                'attribute' => 'type',
                'filter' => Bill::getTypeOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                 'content' => function (Bill $model, $key, $index, $column) {
                    return $model->getTypeText();
                } 
            ],
            [
                'attribute' => 'amount',
                'format' => 'currency',
                 'headerOptions' => ['class' => 'text-center', 'style' => 'width: 100px'],
                 'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'status',
                'filter' => Bill::getStatusOptions(),
                 'headerOptions' => ['class' => 'text-center', 'style' => 'width: 115px'],
                 'contentOptions' => ['class' => 'text-center'],
                 'content' => function (Bill $model, $key, $index, $column) {
                    return $model->getStatusText();
                 } 
            ],
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 90px'],
                'contentOptions' => ['class' => 'text-center'],
                'header' => 'Ações',
                'urlCreator' => function ($action, Bill $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
</div>
