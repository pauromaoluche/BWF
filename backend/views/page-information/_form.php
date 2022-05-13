<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PageInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'file')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'html')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'maxlength')->textInput() ?>

    <?= $form->field($model, 'is_page')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
