<?php

namespace app\controllers;

use app\models\Courses;
use app\models\Minicourses;
use app\models\Posts;
use app\models\Reviews;
use app\models\SiteForm;
use app\models\Sites;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
        $query = Posts::find()->where(['hide' => 0]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        Posts::setNumbers($posts);

        return $this->render('index',[
            'posts' => $posts,
            'active_page' => Yii::$app->request->get('page', 1),
            'count_pages' => $pagination->getPageCount(),
            'pagination' => $pagination,
        ]);
    }

    public function actionAuthor()
    {
        return $this->render('author');
    }

    public function actionVideo()
    {
        $courses = Courses::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('video', [
            'courses' => $courses,
        ]);
    }

    public function actionRev()
    {
        $reviews = Reviews::find()
            ->orderBy('RAND()')
            ->all();

        return $this->render('rev', [
            'reviews' => $reviews,
        ]);
    }

    public function actionSites()
    {
        $sites = Sites::find()
            ->where(['active' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('sites', [
            'sites' => $sites,
        ]);
    }

    public function actionAddsite()
    {
        $siteForm = new SiteForm();

        if($siteForm->load(Yii::$app->request->post()) && $siteForm->validate())
        {
            $sites = new Sites();
            $sites->description = $siteForm->description;
            $sites->address = $siteForm->address;
            $sites->save();

            return $this->render('addsite', [
                'form' => $siteForm,
                'success' => true,
                'error' => false,
            ]);
        }
        else
        {
            $error = Yii::$app->request->post('address') ? true : false;

            return $this->render('addsite', [
                'form' => $siteForm,
                'success' => false,
                'error' => $error,
            ]);
        }
    }

    public function actionPost()
    {
        $postId = Yii::$app->getRequest()->getQueryParam('id');
        $post = Posts::find()->where(['id' => $postId])
            ->one();
        Posts::setNumbers([$post]);

        return $this->render('post', [
            'post' => $post,
        ]);
    }

    public function actionReleases()
    {
        $query = Posts::find()->where(['hide' => 0, 'is_release' => 1]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy(['date' => SORT_DESC])
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        Posts::setNumbers($posts);

        $mincourses = Minicourses::find()->all();

        return $this->render('releases', [
            'posts' => $posts,
            'minicourses' => $mincourses,
            'active_page' => Yii::$app->request->get('page', 1),
            'count_pages' => $pagination->getPageCount(),
            'pagination' => $pagination,
        ]);
    }
}
