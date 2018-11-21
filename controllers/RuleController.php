<?php

namespace yiichina\modules\rbac\controllers;

use yii\web\Controller;

/**
 * SiteController implements the CRUD actions for User model.
 */
class RuleController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}