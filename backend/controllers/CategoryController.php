<?php

namespace backend\controllers;

use backend\models\Category;
use nickdenry\grid\toggle\actions\ToggleAction;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actions()
    {
        return [
            'status-change' => [
                'class' => ToggleAction::class,
                'modelClass' => 'backend\models\Category', // Your model class,
//                'pkColumn' => 'status', // 'id' by default
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'category' => Category::findOne($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->session->setFlash('info', 'Категория успешно создана');
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $category = Category::findOne($id);

        if ($category->load(Yii::$app->request->post()) && $category->validate() && $category->save()) {
            Yii::$app->session->setFlash('info', 'Категория успешно изменена');
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'category' => $category
        ]);
    }

    public function actionDelete($id)
    {
        $category = Category::findOne($id);

        try {
            $category->delete();
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }
}