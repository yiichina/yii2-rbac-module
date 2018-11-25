<?php

namespace yiichina\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use backend\models\UserSearch;
use yiichina\modules\rbac\models\AuthAssignment;

/**
 * SiteController implements the CRUD actions for User model.
 */
class AssignmentController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        $class = Yii::$app->user->identityClass;
        if (($user = $class::findIdentity($id)) !== null) {
            $model = Yii::createObject([
                'class'   => AuthAssignment::className(),
                'user_id' => $id,
            ]);
            return $model;
        }
    }
}