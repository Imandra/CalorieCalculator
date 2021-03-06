<?php

class ProductController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('view', 'create', 'update', 'admin', 'delete', 'saveAsProduct'),
                'roles' => array('user'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     * @throws CHttpException
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        if (!Yii::app()->user->checkAccess('manageProducts', array('product' => $model))) {
            throw new CHttpException(403, Yii::t('default', 'You are not authorized to perform this action.'));
        }

        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Product;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            $model->owner_id = Yii::app()->user->id;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * @throws CHttpException
     */
    public function actionSaveAsProduct()
    {
        $model = new Product();

        if (isset($_POST['Save'])) {
            $model->name = $_POST['Save'];
            $model->proteins = Yii::app()->calculator->totalProteinsPer100;
            $model->fats = Yii::app()->calculator->totalFatsPer100;
            $model->carbohydrates = Yii::app()->calculator->totalCarbohydratesPer100;
            $model->calories = Yii::app()->calculator->totalCaloriesPer100;
            $model->owner_id = Yii::app()->user->id;

            if ($model->save()) {
                Yii::app()->user->setFlash('success', Yii::t('product', 'Product Saved!'));
                $this->redirect(array('site/index'));
            } else {
                $errors = $model->getErrors('name');
                $error = !empty($errors) ? ' ' . $errors[0] : '';
                Yii::app()->user->setFlash('error', Yii::t('product', 'Error! Product Is Not Saved!') . $error);
                $this->redirect(array('site/index'));
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     * @throws CHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (!Yii::app()->user->checkAccess('manageProducts', array('product' => $model))) {
            throw new CHttpException(403, Yii::t('default', 'You are not authorized to perform this action.'));
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     * @throws CDbException
     * @throws CHttpException
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {

            $model = $this->loadModel($id);

            if (!Yii::app()->user->checkAccess('manageProducts', array('product' => $model))) {
                throw new CHttpException(403, Yii::t('default', 'You are not authorized to perform this action.'));
            }

            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product'])) {
            $model->attributes = $_GET['Product'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Product::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}