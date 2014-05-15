<?php

class UserController extends Controller
{
    const ROLE_ADMIN = 'administrator';

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
            ),
        );
    }

    public function actionLogin()
    {
        $model = new LoginForm;

        $this->layout = 'login';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                if (Yii::app()->user->role == self::ROLE_ADMIN) {
                    $this->redirect('/administrator/');
                } else {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
        }

        $this->render('login', array('model' => $model));
    }


    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->getHomeUrl());
    }

    public function actionRegistration()
    {
        $newUser = new Users('registration');

        if (isset($_POST['Users'])) {
            $newUser->attributes = $_POST['Users'];

            if ($newUser->registration($_POST['Users'])) {
                $this->redirect('succesfullregistration');
            }
        }

        $this->render('registration', ['model' => $newUser]);
    }
    public function actionSuccesfullRegistration()
    {
        $this->render('succesfull_registration');
    }
    public function actionMail()
    {
        mail('erwfg@mailforspam.com', 'gas', 'fgasg');
    }
    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

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