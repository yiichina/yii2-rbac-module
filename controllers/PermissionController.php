<?php

namespace yiichina\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use yiichina\modules\rbac\models\Permission;
use yii\data\ArrayDataProvider;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        $dataProvider = new ArrayDataProvider([
            'allModels' => $auth->getPermissions(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['name', 'description'],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Permission();

        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect(['update', 'name' => $model->name]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($name)
    {
        $model = $this->findModel($name);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['update', 'name' => $model->name]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($name)
    {
        $auth = Yii::$app->authManager;
        $model = new Permission();
        $permission = $auth->getPermission($name);
        $model->name = $permission->name;
        $model->description = $permission->description;
        return $model;
    }
}