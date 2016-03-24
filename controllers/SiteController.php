<?php

namespace app\controllers;

use Yii,
    yii\filters\AccessControl,
    yii\web\Controller,
    yii\filters\VerbFilter,
    app\models\LoginForm,
    app\models\ContactForm,
    app\models\SignupForm,
    app\models\User,
    yii\web\UploadedFile,
    DateTime;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],

                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();


        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->actionUserinfo(Yii::$app->user->identity);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {

        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->setPassword($model->password);
            $user->phone_number = $model->phone_number;
            $user->generateAuthKey();

            $image = UploadedFile::getInstance($model, 'photo');


            $user->setPhotoName($timestamp . $image->name);
            $photopath = Yii::$app->basePath . '/web/img_upload/' . $timestamp. $image->name  ;

            if($user->save()) $image->saveAs($photopath);

            return $this -> goHome();

        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionUserinfo($userinfo)
    {
        return $this->render('userinfo', [
            'model' => $userinfo,
        ]);

    }


}
