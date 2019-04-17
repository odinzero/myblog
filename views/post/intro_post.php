

<?php //var_dump($post->img) ?>
<div class="content-container">
    <div class="row">
        <div class="">
            <div class="col-lg-12 alert alert-info"> 

                <div class="col-lg-3">
                    <img src="<?= $post->img ?>" alt="" width="200" height="200" />
                </div>

                <div class="col-lg-9">
                    <h4>Release <?= $post->id; ?></h4>
                    <h2><?= $post->title ?></h2>
                    <p><?= $post->description ?></p>
                    <p class="more">
                        <?php   if(Yii::$app->user->isGuest) { //if ($_SESSION['username'] == '') { ?>
                            <a class="btn btn-default" href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>">ЧИТАТЬ ПОЛНОСТЬЮ &gt;&gt;</a>
                        <?php } else { ?>
                            <a class="btn btn-default" href="<?= Yii::$app->urlManager->createUrl(['post/viewpost', "id" => $post->id]) ?>">ЧИТАТЬ ПОЛНОСТЬЮ &gt;&gt;</a>
                        <?php } ?>
                    </p>
                    <div class="info">
                        <div class="date"><?= gmdate("F j, Y, g:i a", $post->create_time); ?></div>
                        <div class="clear"></div>
                    </div>  
                </div>

            </div>
        </div>
    </div>
</div>