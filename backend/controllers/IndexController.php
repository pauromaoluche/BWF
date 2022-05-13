<?php

namespace backend\controllers;

use Yii;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
