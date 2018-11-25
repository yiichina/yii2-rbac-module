<?php

namespace yiichina\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

/**
 * Class ItemController
 */
class ItemController extends Controller
{
    protected $modelClass;

    public function actionIndex()
    {
        $model = Yii::createObject([
            'class' => $this->modelClass,
        ]);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $model->getAuthItems(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['name', 'description'],
            ],
        ]);

        return $this->render('/item/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = Yii::createObject([
            'class' => $this->modelClass,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('/item/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($name)
    {
        $model = Yii::createObject([
            'class' => $this->modelClass,
            'oldName' => $name,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'name' => $model->name]);
        }

        return $this->render('/item/update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($name)
    {
        $model = Yii::createObject([
            'class' => $this->modelClass,
        ]);

        $model->manager->remove($model->authItem);
        return $this->redirect(['index']);
    }
}
