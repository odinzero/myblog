<?php

use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use yii\bootstrap\Html;

//var_dump($timeModel);
?>

<div class="col-sm-12"> 
    <div class="alert alert-info">
    <?php
    $form = ActiveForm::begin([
                'id' => 'daterange1',
                'action' => ['/post/index'],
                'method' => 'post',
    ]);
    require_once Yii::$app->basePath . '\views\daterange\addon.php';
   // include 'addon.php';

    //var_dump($_POST);
    
    if(empty($_POST)) {
    $timeModel->datetimeStart = '2019-03-30';
    $timeModel->datetimeEnd = '2019-03-31';
    }
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
        'name' => 'date_range',
        'model' => $timeModel,
        'attribute' => 'datetimeStart',
        //'value'=>'datetimeStart' . " - " . 'datetimeEnd',
        'useWithAddon' => true,
        'convertFormat' => true,
        'startAttribute' => 'datetimeStart',
        'endAttribute' => 'datetimeEnd',
        'pluginOptions' => [
            'locale' => ['format' => 'Y-m-d'],
        ]
    ]) . $addon;
    echo '</div>';
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>       
    </div>

    <?php
    $form = ActiveForm::end();
    ?>
    </div>
</div>
