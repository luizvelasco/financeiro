<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Bill;

/** @var yii\web\View $this */
/** @var app\models\Bill $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?> 

    <?= $form->field($model, 'type')->dropDownList(Bill::getTypeOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?> 

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(Bill::getStatusOptions(), [
        'prompt' => ':: Selecione ::'
    ]) ?> 

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
