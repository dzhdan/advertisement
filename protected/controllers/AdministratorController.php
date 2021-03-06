<?php

class AdministratorController extends Controller
{
    public $layout = 'admin_general';

    public function actionIndex()
    {
        $model = new Advert('search');
        $model->unsetAttributes();

        if (isset($_GET['Advert'])) {
            $model->attributes = $_GET['Advert'];
        }

        $this->render('index', ['model' => $model]);
    }

    public function actionNew()
    {
        $model = new Advert('search');

        $criteria = new CDbCriteria();
        $criteria->condition = 'pub_status = 1';

        $count = $model->count($criteria);
        $model->unsetAttributes();

        if (isset($_GET['Advert'])) {
            $model->attributes = $_GET['Advert'];
        }
        if ($count == 0) {
            $this->redirect('/administrator');
        }
        $this->render('/advert/new_adverts', ['model' => $model, 'count' => $count]);
    }

    public function actionEdited()
    {
        $model = new Advert('search');

        $count = $model::getEditedCount();
        $model->unsetAttributes();

        if (isset($_GET['Advert'])) {
            $model->attributes = $_GET['Advert'];
        }
        if ($count == 0) {
            $this->redirect('/administrator');
        }
        $this->render('/advert/edited_adverts', ['model' => $model, 'count' => $count ]);
    }

    public function actionUsers()
    {
        $model = new Users('search');
        $model->unsetAttributes();

        if (isset($_GET['Users'])) {
            $model->attributes = $_GET['Users'];
        }

        $this->render('users', ['model' => $model]);
    }

    public function actionCategory($id)
    {
        $model = Advert::model()->loadAdverts($id);
        $this->render('category', ['model' => $model]);
    }

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
            /*array('deny',
                'actions'=>array('create', 'edit'),
                'users'=>array('?'),
            ),*/
            array('allow',
                'roles' => array('administrator'),
            ),
            array('deny',
                'users' => array('*'),
            ),
            /*array('deny',
                'actions'=>array('delete'),
                'users'=>array('*'),
            ),*/
        );
    }

    /*
        public function actions()
        {
            // return external action classes, e.g.:
            return array(
                'action1'=>'path.to.ActionClass',
                'action2'=>array(
                    'class'=>'path.to.AnotherActionClass',
                    'propertyName'=>'propertyValue',
                ),
            );
        }
        */
}