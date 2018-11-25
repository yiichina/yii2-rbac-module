Yii 2 RBAC Module
===================================

[![Latest Stable Version](https://poser.pugx.org/yiichina/yii2-rbac-module/v/stable.png)](https://packagist.org/packages/yiichina/yii2-rbac-module)
[![Total Downloads](https://poser.pugx.org/yiichina/yii2-rbac-module/downloads.png)](https://packagist.org/packages/yiichina/yii2-rbac-module)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

安装
----

安装这个扩展的首选方法是通过 [composer](http://getcomposer.org/download/)。

可以运行

```
composer require --prefer-dist yiichina/yii2-rbac-module "*"
```

也可以添加

```
"yiichina/yii2-rbac-module": "*"
```

到你的 `composer.json` 文件的包含部分。


安装方法
-------

### 初始化数据库

```
php yii migrate/up --migrationPath=@yii/rbac/migrations
```

也可以找到 `@yii/rbac/migrations` 目录下的数据库脚本去执行。

### 配置模块

```
'modules' => [
    'rbac' => [
        'class' => 'yiichina\modules\rbac\Module',
    ],
],
```

### 配置 RBAC

```
'authManager' => [
    'class' => 'yii\rbac\DbManager',
    'defaultRoles' => ['user'],
],
```

使用方法
-------

```
/index.php?r=rbac/assignment
/index.php?r=rbac/permission
/index.php?r=rbac/role
/index.php?r=rbac/rule
```

如果配置了 URL 美化，您可以使用如下 URL：


```
/rbac/assignment
/rbac/permission
/rbac/role
/rbac/rule
```

在需要权限判断的时候，使用如下方式：

```
if (Yii::$app->user->can('admin')) {
    // 可以执行的语句
}
```

使用控制器行为：

```
public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['delete'],
            'rules' => [
                'actions' => ['delete'],
                'allow' => true,
                'roles' => ['admin'], // 在这里指定可以操作此动作的角色
                'verbs' => ['POST'],
            ],
        ],
    ];
}
```
延伸阅读
-------

如果需要针对动作的权限管理，请参考：
https://github.com/yii2mod/yii2-rbac

同时包含 `DbManager` 和 `PhpManager` 的权限管理：
https://github.com/dektrium/yii2-rbac