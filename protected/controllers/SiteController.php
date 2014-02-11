<?php

class SiteController extends Controller
{
    public $layout='general';

	public function actionIndex()
	{
        $model = $this->loadModel();
        $category = Category::model()->loadAllCategory();
        $limit = 8;
        $this->render('index',array('category'=>$category,'model'=>$model,'limit'=>$limit));
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function loadModel()
    {
        $criteria = new CDbCriteria(array(

        ));
        $criteria->condition = 'deleted = 0';
        $criteria->addCondition("pub_status = '0'");
        $criteria->order = 'create_date DESC';
        $data = Advert::model()->findAll($criteria);


        return $data;
    }

}