<?php

class AdministratorController extends Controller
{
    public $layout = 'admin_general';

	public function actionIndex()
	{
        $model = new Advert('search');
        $model->unsetAttributes();

        if(isset($_GET['Advert'])){
            $model->attributes=$_GET['Advert'];
        }
        $this->render('index', array('model'=>$model));
	}

    public function actionCategory($id)
    {
        $model = Advert::model()->loadAdverts($id);
        $this->render('category', array('model'=>$model));
    }

    public function actionNew()
    {
        $model = new Advert();
        $model->setScenario('search');
        $model->unsetAttributes();
        if(isset($_GET['Advert'])){
            $model->attributes=$_GET['Advert'];
        }
        $this->render('/advert/new_adverts', array('model'=>$model));
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
                'roles'=>array('administrator'),
            ),
            array('deny',
                'users'=>array('*'),
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