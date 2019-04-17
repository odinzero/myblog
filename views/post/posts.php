<?php
/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = Yii::t('app', 'My Blog');

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Мой личный блог и его выпуски'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'алексей кравченко, блог алексей кравченко, рассылка алексей кравченко'
]);

//echo $_SESSION['username'];
//echo "identity: " . Yii::$app->user->identity;
//var_dump(Yii::$app->user->identity);
?>
<div class="site-index">
    <div class="jumbotron">
        <?= $this->render("@app/views/daterange/index", ['timeModel' => $timeModel]) ?>
    </div>
    <div class="row centered-form center-block">
        <div class="container col-md-10 col-md-offset-1">
            <?php
            foreach ($posts as $post) {
                include 'intro_post.php';
            }
            ?>
        </div>
    </div>
</div>    

<div id="pagination" class="jumbotron">
    <?php
    echo LinkPager::widget([
        'pagination' => $pagination,
        'firstPageLabel' => 'в начало',
        'lastPageLabel' => 'в конец',
        'prevPageLabel' => '&laquo;'
    ]);
    ?>
    <span>Страница <?= $active_page ?> из <?= $count_pages ?></span> 
    <div class="clear"></div>
</div>