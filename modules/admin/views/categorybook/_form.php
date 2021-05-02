<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorybook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorybook-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'book_id')->dropDownList($books) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
