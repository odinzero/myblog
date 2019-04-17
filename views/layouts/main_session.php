<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Blog',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    // 'Додому'
                    ['label' => 'Додому', 'url' => ['/post/index']],
                    
                    
                   // ['label' => 'POSTS', 'url' => ['/post/search']],
                   // ['label' => 'CREATE POSTS', 'url' => ['/post/create']],
                    
                    // 'PostManagement'
                    ( $_SESSION['username'] != 'admin')  ? (
                             '<li>' . '</li>'
                            ) : ( 
                             ['label' => 'PostManagement', 'url' => ['/post/search']] 
                            ),
                    // 'UserManagement'
                     ( $_SESSION['username'] != 'admin')  ? (
                             '<li>' . '</li>'
                            ) : (
                             ['label' => 'UserManagement', 'url' => ['/user/index']] 
                            ),
                     // 'Пости'
                     ( $_SESSION['username'] == '')  ? (
                             '<li>'
                            . Html::beginForm(['/post/index'], 'post')
                            . Html::submitButton('Пости', ['class' => 'btn btn-link logout']  )
                            . Html::endForm()
                            . '</li>'
                            ) : ( 
                             ['label' => 'Пости', 'url' => ['/post/search']] )
                            ,
                    // 'Пост',
                    ['label' => 'Пост', 'url' => ['/post/viewpost']],
                    // 'Створення посту'
                      ( $_SESSION['username'] == '')  ? (
                             '<li>'
                            . Html::beginForm(['/site/redirection'], 'post')
                            . Html::submitButton('Створення посту', ['class' => 'btn btn-link logout']  )
                            . Html::endForm()
                            . '</li>'
                            ) : (
                            ['label' => 'Створення посту', 'url' => ['/post/create']]
                            ),
                    // 'Вхід'
                     ( $_SESSION['username'] == '')  ? (
                            ['label' => 'Вхід', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Вихід (' . $_SESSION['username'] . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            ),
                    // 'Реєстрація'
                     ( $_SESSION['username'] == '')  ? (
                            ['label' => 'Реєстрація', 'url' => ['/site/registration']]
                            ) : ( '' )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
        
       
    </body>
</html>
<?php $this->endPage() ?>
