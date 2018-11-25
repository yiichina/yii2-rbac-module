<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'items')->checkboxList($model->rolesList) ?>

<?= Html::submitButton('授权', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

