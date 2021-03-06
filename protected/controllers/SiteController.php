<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $product = new Product();
        $list = $product->productOptions;
        $positions = Yii::app()->calculator->getPositions();
        $this->render('index', array('list' => $list, 'positions' => $positions));
    }

    /**
     * @throws CException
     */
    public function actionAddPosition()
    {
        if (isset($_POST['id']) && isset($_POST['type'])) {
            $id = $_POST['id'];
            $modelName = $_POST['type'];
            if (PositionHelper::is_model($modelName)) {
                $position = $modelName::model()->findByPk($id);
                if (!empty($position))
                    Yii::app()->calculator->addItem($position);
            }
            $this->deleteCache('list');
            if (Yii::app()->request->isAjaxRequest) {
                Yii::app()->clientScript->scriptMap = array(
                    // В карте отключаем загрузку core-скриптов, УЖЕ подключенных до ajax загрузки
                    'jquery.js' => false,
                    'jquery.min.js' => false,
                    'jquery-ui.min.js' => false,
                    'jquery-ui.css' => false,
                    'custom.css' => false,
                    'chosen.jquery.js' => false,
                    'chosen.css' => false
                );
                $positions = Yii::app()->calculator->getPositions();
                $product = new Product();
                $list = $product->productOptions;
                $this->renderPartial('_calculator', array('list' => $list, 'positions' => $positions), false, true);
                Yii::app()->end();
            }
        }
        $this->redirect(array('index'));
    }

    /**
     * @throws CException
     */
    public function actionRemovePosition()
    {
        if (isset($_POST['del-key'])) {
            $key = $_POST['del-key'];
            Yii::app()->calculator->remove($key);
            $this->deleteCache('list');

            if (Yii::app()->request->isAjaxRequest) {
                Yii::app()->clientScript->scriptMap = array(
                    // В карте отключаем загрузку core-скриптов, УЖЕ подключенных до ajax загрузки
                    'jquery.js' => false,
                    'jquery.min.js' => false,
                    'jquery-ui.min.js' => false,
                    'jquery-ui.css' => false,
                    'custom.css' => false,
                    'chosen.jquery.js' => false,
                    'chosen.css' => false
                );
                $positions = Yii::app()->calculator->getPositions();
                $product = new Product();
                $list = $product->productOptions;
                $this->renderPartial('_calculator', array('list' => $list, 'positions' => $positions), false, true);
                Yii::app()->end();
            }
        }
        $this->redirect(array('index'));
    }

    /**
     * @throws CException
     */
    public function actionChangePositionWeight()
    {
        if (isset($_POST['key']) && isset($_POST['weight'])) {
            $key = $_POST['key'];
            $weight = $_POST['weight'];
            $position = Yii::app()->calculator->itemAt($key);
            Yii::app()->calculator->update($position, $weight);

            if (Yii::app()->request->isAjaxRequest) {
                Yii::app()->clientScript->scriptMap = array(
                    // В карте отключаем загрузку core-скриптов, УЖЕ подключенных до ajax загрузки
                    'jquery.js' => false,
                    'jquery.min.js' => false,
                    'jquery-ui.min.js' => false,
                    'jquery-ui.css' => false,
                    'custom.css' => false,
                    'chosen.jquery.js' => false,
                    'chosen.css' => false
                );
                $positions = Yii::app()->calculator->getPositions();
                $product = new Product();
                $list = $product->productOptions;
                $this->renderPartial('_calculator', array('list' => $list, 'positions' => $positions), false, true);
                Yii::app()->end();
            }
        }
        $this->redirect(array('index'));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                //$this->redirect(Yii::app()->user->returnUrl);
                $this->redirect(array('index'));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSignUp()
    {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(array('index'));
        }

        $userModel = new User('register');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $userModel->attributes = $_POST['User'];
            if ($userModel->save()) {
                $loginForm = new LoginForm();
                $loginForm->username = $userModel->username;
                $loginForm->password = $_POST['User']['new_password'];

                // логиним пользователя
                if ($loginForm->validate() && $loginForm->login()) {
                    Yii::app()->user->setFlash('signUp', Yii::t('default', 'Registration successful'));
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('signUp', array('model' => $userModel));
    }
}