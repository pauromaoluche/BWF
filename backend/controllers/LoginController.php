<?php

namespace backend\controllers;

namespace backend\controllers;

use backend\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\SignupForm;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'blank';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            self::createCookieCKFinder();
            return $this->redirect(['/index']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $this->layout = 'blank';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return Yii::$app->user->loginRequired();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    protected function createCookieCKFinder()
    {
        return setcookie("KCFINDER", base64_encode(serialize(['disabled' => false])), false, '/');
    }
}
