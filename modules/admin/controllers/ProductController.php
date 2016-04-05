<?php


namespace app\modules\admin\controllers;

use Yii,
    yii\filters\VerbFilter,
    yii\filters\AccessControl,
    app\modules\admin\models\Product,
    app\modules\admin\models\ProductSearch,
    yii\web\Controller,
    yii\web\NotFoundHttpException,
    yii\web\UploadedFile;

class ProductController extends Controller
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
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['user'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $product = new Product();

        if ($product->load(Yii::$app->request->post()) && $product->validate()) {

            $product = $this->photoTake($product);

            $product->save();
            return $this->render('view', ['model' => $product]);
        } else {
            return $this->render('create', [
                'model' => $product,
            ]);
        }
    }

    public function actionProductmanager() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('productmanager', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

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
        return $this->redirect(['productmanager']);
    }

    protected function findModel($id)
    {
        $model = Product::findOne($id);
        if (isset($model)){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    private function photoTake($object) {

        $photo = UploadedFile::getInstance($object, 'photo');

        if (!empty($photo)) {
            $photopath = Yii::$app->basePath . '/web/product_img_upload/' . $photo->name ;
            $photo->saveAs($photopath);
            $object->productphoto = $photo->name;
        } else {
            $object->productphoto = 'default.png';
        }

        return $object;

    }

}