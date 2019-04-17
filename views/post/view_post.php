

<div class="content-container">
    <div class="">
        <div class="">
            <div class="col-lg-12 alert alert-info"> 

                    <h4>Release <?= $post->id; ?></h4>
                    <h2><?= $post->title ?></h2>
                    
                    
                    <div class="pull-right text-right"  ><p><?= $post->content ?></p></div>
                    <img src="<?= $post->img ?>" alt="" width="300" height="300" class="pull-left" />

                    <p class="info date">
                        <div class="pull-right text-right"><?= gmdate("F j, Y, g:i a", $post->create_time); ?></div>
                    </p> 
            </div>
        </div>
    </div>
</div>