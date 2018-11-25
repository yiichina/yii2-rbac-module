<?php
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => '授权管理', 'url' => ['/rbac/assignment']];
$this->params['breadcrumbs'][] = '用户授权';
?>
<div class="page-header">
    <h1>用户授权</h1>
</div>

<?= DetailView::widget([
    'model' => $user,
    'attributes' => [
        'id',
        'username',
        'created_at:datetime',
    ],
]) ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>