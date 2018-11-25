<?php

$this->params['breadcrumbs'][] = ['label' => $model->typeName . '管理', 'url' => ['/rbac/assignment']];
$this->params['breadcrumbs'][] = '修改' . $model->typeName;
?>

<div class="page-header">
    <h1>修改<?= $model->typeName ?></h1>
</div>

<?= $this->render('_form', [
    'model' => $model,
]) ?>