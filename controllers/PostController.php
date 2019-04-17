<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\User;
use app\models\mongo\TblUser;
use app\models\mongo\TblPost;
use app\models\Daterange;
use app\models\UploadForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\db\Expression;
use app\models\PostSearch;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\UploadedFile;


class PostController extends \yii\web\Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex0() {
        echo strtotime('2019-04-01 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-03 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-05 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-07 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-08 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-09 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-10 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-12 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-14 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-16 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-17 14:00:00');
        echo '<br>';
        echo strtotime('2019-04-18 14:00:00');
        echo '<br>';
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        // session default 
        $session = Yii::$app->session;
        $session->open();  
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        $session->set('username', $username);
        
        $query = Post::find()->where([]);
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);

        //Post::setNumbers($posts);
        $timeModel = new Daterange();

        // && !empty($_POST['Daterange']['date_range'])
        if ($timeModel->load(Yii::$app->request->post())) {

            // var_dump($timeModel);
            //       echo "datetimeStart:" . $_POST['Daterange']['datetimeStart'];
//            echo "datetimeEnd:" . $_POST['Daterange']['datetimeEnd'];
//            if (isset($_POST['Daterange']['date_range'])) {
//               
            $data_range = $_POST['Daterange']['datetimeStart'];
            $data_range = explode(' - ', $data_range);

            //convert to UNIX format
            $datetimeStart = strtotime(trim($data_range[0]));
            $datetimeEnd = strtotime(trim($_POST['Daterange']['datetimeEnd']));

            echo "start:" . $timeModel->datetimeStart;
            echo "end:" . $timeModel->datetimeEnd;

            $searchModel = new PostSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


            $query = Post::find()->where(['and', "create_time>=" . $datetimeStart . "",
                "create_time<=" . $datetimeEnd . ""]);

            $timeModel->datetimeStart = trim($data_range[0]);
            $timeModel->datetimeEnd = trim($_POST['Daterange']['datetimeEnd']);
        }

        $posts = $query->orderBy(['create_time' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('posts', [
                    'posts' => $posts,
                    'active_page' => Yii::$app->request->get("page", 1),
                    'count_pages' => $pagination->getPageCount(),
                    'pagination' => $pagination,
                    'timeModel' => $timeModel
        ]);
    }

    public function actionFilter() {
        $dsn = 'mysql:host=localhost;dbname=myblog';
        $username = 'root';
        $password = '';

        $connection = new \yii\db\Connection([
            'dsn' => $dsn,
            'username' => $username,
            'password' => $password,
        ]);

        $connection->open();

        $command0 = $connection
                ->createCommand("
                        SELECT * FROM tbl_post WHERE `create_time` BETWEEN '1554206400' AND '1554379200' ");

        $posts = $command0->queryAll();

        var_dump($posts);
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionSearch() {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    // $id
    public function actionViewpost($id) {
        $post = $this->findPostModel($id);
        return $this->render('view_post', [
                    'post' => $post,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findPostModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Post();

        //$user_id = $this->findUserModel($id);
        // echo $user_id->id ;

        // FOR MONGO
        $user_id = $_SESSION['id'];
        // FOR MYSQL
        //$user_id = Yii::$app->user->getId();

        $fileModel = new UploadForm();
//         if ($model->load(Yii::$app->request->post()) && $model->save() ) { //
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $fileModel->file = UploadedFile::getInstance($fileModel, 'file');

//            var_dump(Yii::$app->request->post());
//            die();

            if ($fileModel->file != "") {
                
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = '';
                for ($i = 0; $i < 6; $i++) {
                    $randstring = $characters[rand(0, strlen($characters) - 1)];
                }

                $fileModel->file->saveAs('images/'
                        . $randstring . '_'
                        . $fileModel->file->baseName . '.'
                        . $fileModel->file->extension);

                $model->img = $randstring . '_' . $fileModel->file->baseName . '.'
                        . $fileModel->file->extension;
            } else {
                $model->img = "";
            }

            $model->save();

//            var_dump(Yii::$app->request->post());
//            die();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'fileModel' => $fileModel,
                        'id' => $user_id,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findPostModel($id);

        $fileModel = new UploadForm();

        if ($model->load(Yii::$app->request->post())) { //&& $model->save()
            $fileModel->file = UploadedFile::getInstance($fileModel, 'file');

//            var_dump(Yii::$app->request->post());
//            die();

            if ($fileModel->file != "") {

                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = '';
                for ($i = 0; $i < 6; $i++) {
                    $randstring = $characters[rand(0, strlen($characters) - 1)];
                }

                $fileModel->file->saveAs('images/'
                        . $randstring . '_'
                        . $fileModel->file->baseName . '.'
                        . $fileModel->file->extension);

                $model->img = $randstring . '_' . $fileModel->file->baseName . '.'
                        . $fileModel->file->extension;
            } else {
                $model->img = $this->findPostModel($model->id)->img;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'fileModel' => $fileModel,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {

        $this->findPostModel($id)->delete();

        return $this->redirect(['post/search']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPostModel($id) {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findUserModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
// ======================== MONGO ============================================== 
    
    protected function findUserMongoModel($id) {
        if (($model = TblUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
