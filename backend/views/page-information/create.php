<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PageInformation */

$this->title = Yii::t('backend', 'Create Page Information');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Page Informations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
