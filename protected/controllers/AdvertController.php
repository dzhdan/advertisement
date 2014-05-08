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
                'actions' => array('edit, AjaxDelete', 'publish'),
            ),
            array('deny',
                'actions' => array('publish'),
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
            $model->text = nl2br($model->text);
            if($model->save()){
                Yii::app()->user->setFlash('success', "Обьявление добавлено успешно!");
                $this->redirect('/advert/create');
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
        if($advert->user_id!==Yii::app()->user->user_id) throw new CHttpException('404', 'Acess denied');

        if (isset($_POST['Advert'])) {
            $advert->attributes = $_POST['Advert'];
            $advert->edited  = 1;

            if($advert->save()){
                Yii::app()->user->setFlash('success', "Обьявление обновлено успешно!");
            }
        }

        $categories = Category::model()->loadAllCategory();
        $this->render('edit', array('model' => $advert, 'categories' => $categories));
    }

    public function actionEditedConfirm($id){
        $advert = Advert::model()->loadAdvert($id);
        $advert->edited  = 0;
        $advert->save();

//        $this->render('edit', array('model' => $advert));
    }

    public function actionPublish($id)
    {
        $model = $this->loadModel($id);

        if ($model->publish()) {
            Yii::app()->user->setFlash('success', "Form posted!");
            $this->redirect('/administrator/new');
        }
    }

    public function actionDelete($id){
        $model = $this->loadModel($id);
        $model->deleted = 1;
        if($model->save()){
            Yii::app()->user->setFlash('success', "Form posted!");
        }

    }
     public function actionAjaxDelete()
     {
         if(isset($_POST['autoId']) && count($_POST['autoId']) > 0){
            $data = $_POST['autoId'];
             foreach($data as $id){
                 $model = Advert::model()->findByPk($id);
                 $model->deleted = 1;
                 $model->save();
             }

         }


}

    public function actionList()
    {
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->getBaseUrl(true));
        }
        $model = new Advert('search');
        $this->render('list', array('model' => $model));
    }


}