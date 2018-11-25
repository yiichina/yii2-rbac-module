<?php

namespace yiichina\modules\rbac\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * SiteController implements the CRUD actions for User model.
 */
class RuleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbFilter' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionUpdate($name)
    {
        return $this->render('update');
    }

    public function actionDelete($name)
    {
        $this->redirect(['index']);
    }
}