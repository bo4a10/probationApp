<?php

namespace app\modules\admin\controllers;

use Yii,
    yii\filters\AccessControl,
    yii\filters\VerbFilter,
    app\modules\admin\models\User,
    app\modules\admin\models\UsersSearch,
    yii\web\Controller,
    yii\web\NotFoundHttpException;

class AdminController extends Controller
{
    const ONEHUNDRED = 100;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['user'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->group == 'admin')) {
            return $this->render('index');
        }
        return $this->goHome();
    }

    public function actionUsersmanager()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('usersmanager', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new User();
        $model->scenario = User::SCENARIO_ADMIN_CREATE;
        $model->setPhotoName('default.png');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = User::SCENARIO_ADMIN_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['usersmanager']);
    }

    protected function findModel($id)
    {
        $model = User::findOne($id);
        if (isset($model)) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'onehundred' => self::ONEHUNDRED,
        ]);
    }

}
