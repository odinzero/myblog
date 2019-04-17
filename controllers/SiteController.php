<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\mongo\LoginFormMongo;
use app\models\Registration;
use app\models\ContactForm;
use app\models\mongo\TblUser;
use app\models\mongo\TblPost;
use app\models\PostSearch;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        //------------------------------ for session --------------------------
//        $session = Yii::$app->session;
//        $session->open();
//        $session->set('username', '');
//        $session->set('id', '');
        //---------------------------------------------------------------------
        
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
        // For MySQL
        //$model = new LoginForm();
        // For Mongo
        $model = new LoginFormMongo();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            //var_dump(Yii::$app->user->identity);

            //--------- for session --------------------------------------------
//            $session = Yii::$app->session;
//            $session->open();
//            unset($session['username']); 
//            
//            $session->set('username', Yii::$app->user->identity->username);
//            $session->set('id', Yii::$app->user->identity->id);
//            
//           // unset($session['user']);  // work
//           // var_dump($_SESSION);
//            
//            echo $_SESSION['username']; 
           // die();
            
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        // for session 
//        $session = Yii::$app->session;
//        $session->open();
//        $session->set('username', '');
//        $session->set('id', '');
        
      //  var_dump($_SESSION);
      //  die();
        
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionRedirection()
    {
        return $this->redirect(["/site/login"]);
    }
    
    
    public function actionRegistration()
    {
      $model2 = new Registration();  
      
      if(isset($_POST['Registration'])) 
      {
         $model2->attributes = Yii::$app->request->post('Registration');
         
         if($model2->validate() && $model2->registrate() ) {
             return  $this->goHome();
         }
      }
      
      return $this->render('/site/registration', ['model2' => $model2, ]);  
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
