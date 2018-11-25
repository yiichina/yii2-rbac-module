<?php

namespace yiichina\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yiichina\modules\rbac\models\AuthAssignment;

/**
 * SiteController implements the CRUD actions for User model.
 */
class AssignmentController extends Controller
{
    private $_identityClass;

    public function init()
    {
        $this->_identityClass = Yii::$app->user->identityClass;
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ($this->_identityClass)::find()->orderBy([
                'id' => SORT_DESC,
            ]),
        ]);

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
            'user' => ($this->_identityClass)::findOne($id),
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