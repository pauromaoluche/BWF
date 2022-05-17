<?php

use common\models\PageInformation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\Helpers;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PageInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Page Informations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-information-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('backend', 'Create Page Information'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'title',
            'subtitle', [
                'attribute' => 'code',
                'format' => 'html',
                'value' => function ($data) {
                    return '<small>Título:</small> <code>page_information(\'' . $data->code . '\', \'title\');</code><br />' .
                        '<small>Subtítulo:</small> <code>page_information(\'' . $data->code . '\', \'subtitle\');</code><br />' .
                        '<small>Texto:</small> <code>page_information(\'' . $data->code . '\');</code>';
                }
            ],
            // 'text:ntext',
            // 'code',
            //'image',
            //'file',
            //'html',
            //'maxlength',
            //'is_page',
            //'created_at',
            //'updated_at',
            //'status',
            //'sort',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PageInformation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>