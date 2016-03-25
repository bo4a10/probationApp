<?php

namespace app\modules\admin\controllers;

use Yii,
    yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if ( !(Yii::$app->user->isGuest) && (Yii::$app->user->identity->token == 'admintoken') ) {
            return $this->render('index');
        }
        return $this->goHome();
    }
}
