<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'ruleName') ?>

<?= $form->field($model, 'data')->textarea(['rows' => 5]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

<?= $form->field($model, 'children')->checkboxList($model->childrenList) ?>

<?= Html::submitButton(empty($model->oldName) ? '添加' : '更新') ?>

<?php ActiveForm::end(); ?>
