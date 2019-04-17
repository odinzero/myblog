<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
$id_action = Yii::$app->controller->action->id;
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php if($id_action == 'create') { ?>
    <?= $form->field($fileModel, 'file')->fileInput(['maxlength' => true]) ?>
    <?php } ?> 
    
    <?php // $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
    <?php if($id_action == 'update') { ?>
    <?= $form->field($fileModel, 'file')->fileInput(['maxlength' => true ]) ?>
    <p style="color:blue;">Old image:<?= $model->img ?> </p>
    <?php } ?> 
    
    <?php if($model->isNewRecord) {  ?>
    <?= $form->field($model, 'create_time' )->textInput(['maxlength' => true, 'value'=> time(),  'readonly'=>true]) ?>
    <?php } else { ?>
    <?= $form->field($model, 'create_time' )->textInput(['maxlength' => true,  'readonly'=>true]) ?>    
    <?php } ?>
    
    <?php if($id_action == 'create') { ?>
    <?= $form->field($model, 'author_id')->textInput(['maxlength' => true, 'value'=> $id, 'readonly'=>true]) ?>
    <?php } ?> 
    
    <?php if($id_action == 'update') { ?>
    <?= $form->field($model, 'author_id')->textInput(['maxlength' => true, 'readonly'=>true]) ?>
    <?php } ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
