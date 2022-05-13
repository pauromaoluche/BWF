<?php

namespace frontend\controllers;
use Yii;

use common\models\PageInformation;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index',[
            'text1' => PageInformation::find()->where(['code' => 'about-1'])->all(),
        ]);
    }

}