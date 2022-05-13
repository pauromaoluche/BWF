<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('backend', 'Sign up');

$form = ActiveForm::begin(['id' => 'signup-form']);
?>
<?php //echo $form->errorSummary($model);                 ?>
<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'last_name'); ?>
<?= $form->field($model, 'email')->input('email'); ?>
<?= $form->field($model, 'password')->passwordInput(); ?>
<?= $form->field($model, 'confirmPassword')->passwordInput(); ?>
<?= Html::submitButton(Yii::t('backend', 'Register'), ['class' => 'btn btn-success btn-block', 'name' => 'login-button']); ?>
<?php ActiveForm::end(); ?>