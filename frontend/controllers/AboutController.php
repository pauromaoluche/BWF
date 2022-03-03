<?php

namespace frontend\controllers;
use Yii;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}