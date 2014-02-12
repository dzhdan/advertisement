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
        if(isset($_GET['checkedIds'])){
            $chkArray=explode(",", $_GET['checkedIds']);
            foreach ($chkArray as $arow){
                Yii::app()->user->setState($arow,1);
            }
        }
        if(isset($_GET['uncheckedIds'])){
            $unchkArray=explode(",", $_GET['uncheckedIds']);
            foreach ($unchkArray as $arownon){
                Yii::app()->user->setState($arownon,0);
            }
        }
        $this->render('index', array('model'=>$model));
	}

    public function actionNew()
    {
        $model = new Advert('search');

        $criteria = new CDbCriteria();
        $criteria->condition = 'pub_status = 1 AND deleted = 0';

        $count = $model->count($criteria);
        $model->unsetAttributes();

        if(isset($_GET['Advert'])){
            $model->attributes=$_GET['Advert'];
        }
        if($count == 0){
            $this->redirect('/administrator');
        }
        $this->render('/advert/new_adverts', array('model'=>$model,'count'=>$count));
    }

    public function actionCategory($id)
    {
        $model = Advert::model()->loadAdverts($id);
        $this->render('category', array('model'=>$model));
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