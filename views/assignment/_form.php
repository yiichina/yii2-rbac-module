<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'user_id') ?>

<?= $form->field($model, 'items')->checkboxList($model->rolesList) ?>

<?= Html::submitButton('更新') ?>

<?php ActiveForm::end(); ?>