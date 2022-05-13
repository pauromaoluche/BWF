<?php

namespace frontend\controllers;
use Yii;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}