<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;

/**
 * Class LogoutController
 * @package backend\controllers
 */
class LogoutController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->user->logout();

        return Yii::$app->user->loginRequired();
    }
}
