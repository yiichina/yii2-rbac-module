<?php

namespace yiichina\modules\rbac;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'yiichina\modules\rbac\controllers';
    public $defaultRoute = 'assignment';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        \Yii::$app->view->params['breadcrumbs'][] = ['label' => 'RBAC 管理模块', 'url' => ['/rbac']];
    }
}
