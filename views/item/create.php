<?php

$this->params['breadcrumbs'][] = ['label' => $model->typeName . '管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '添加' . $model->typeName;
?>

<h1>添加<?= $model->typeName ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>