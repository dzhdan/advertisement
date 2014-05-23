<?php

class UserController extends Controller
{

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

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            $user = Users::model()->findByAttributes(['name' => $model->username]);

            if ($user->activation_status != Users::DEFAULT_ACTIVATION_STATUS) {

                if ($model->validate() && $model->login()) {
                    if (Yii::app()->user->role == Users::ROLE_ADMIN) {
                        $this->redirect('/administrator/');
                    } else {
                        $this->redirect(Yii::app()->user->returnUrl);
                    }
                }

            } else {
                $this->redirect('inactive');
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
                $this->redirect('succesfull-registration');
            }
        }

        $this->render('registration', ['model' => $newUser]);
    }

    public function actionSuccesfullRegistration()
    {
        $this->render('succesfull_registration');
    }

    public function actionInactive()
    {
        $this->render('accountNoActive');
    }

    public function actionActivation()
    {
        $activationcode = Yii::app()->request->getQuery('activation');

        if (isset($activationcode)) {
            $model = Users::model()->findByAttributes([
                'activation_key' => $activationcode
            ]);

            if ($model->activation_status == Users::DEFAULT_ACTIVATION_STATUS) {
                $model->activation_status = Users::ACTIVE_ACTIVATION_STATUS;
                $model->save();
                $this->redirect(['/user/login', 'withConfirmedActivation' => 1]);
            } else {
                $this->redirect(Yii::app()->homeUrl);
            }
        }
    }

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