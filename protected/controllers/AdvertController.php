<?php

class AdvertController extends Controller
{
    public $layout = 'general';

    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'roles' => array('administrator'),
                'actions' => array('edit', 'publish'),
            ),
            array('deny',
                'actions' => array('edit', 'publish'),
                'roles' => array('guest'),
            ),
            /*array('allow',
                'roles'=>array('guest'),
            ),*/
            array('deny',
                'users' => array('guest'),
                'actions' => array('create'),
            ),
            /*array('deny',
                'actions'=>array('delete'),
                'users'=>array('*'),
            ),*/
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionDetails($id)
    {
        $model = $this->loadModel($id);
        $this->render('index', array('model' => $model));
    }

    public function actionCategory($id = null)
    {
        if (isset($id)) {
            $model = Advert::model()->loadAdvertsFromCategories($id);
            $this->render('category_list', array('model' => $model));
        }
    }

    public function loadModel($id)
    {
        $data = Advert::model()->findByPk($id);
        return $data;
    }

    public function actionCreate()
    {
        $model = new Advert('update');
        $model->deleted = 0;
        $model->pub_status = 1;
        $model->user_id = Yii::app()->user->user_id;
        $model->create_date = date('Y-m-d H:i:s');
        $categories = Category::model()->loadAllCategory();

        if (isset($_POST['Advert'])) {

            $model->attributes = $_POST['Advert'];
            if($model->save()){
                Yii::app()->user->setFlash('success', "Обьявление добавлено успешно!");
            }
        }

        $this->render('create', array(
            'model' => $model,
            'categories' => $categories,
        ));
    }

    public function actionEdit($id)
    {
        $advert = Advert::model()->loadAdvert($id);
        if (isset($_POST['Advert'])) {

            $advert->attributes = $_POST['Advert'];
            $advert->save();

        }

        $categories = Category::model()->loadAllCategory();
        $this->render('edit', array('model' => $advert, 'categories' => $categories));
    }

    public function actionPublish($id)
    {
        $model = $this->loadModel($id);

        if ($model->publish()) {
            Yii::app()->user->setFlash('success', "Form posted!");
            $this->redirect('/administrator/new');
        }
    }

    public function actionList()
    {
        $model = new Advert('search');
        $this->render('list', array('model' => $model));
    }


}