<?php
/* @var $this ProductController */
/* @var $model Product */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('default', 'Update') . ' ' . CHtml::encode($model->name);
?>

<?php
$this->breadcrumbs = array(
    //Yii::t('product','Products')=>array('index'),
    CHtml::encode($model->name) => array('view', 'id' => $model->id),
    Yii::t('default', 'Update'),
);

$this->menu = array(
    array('label' => CHtml::encode($model->name), 'url' => array('view', 'id' => $model->id)),
    //array('label'=>Yii::t('product','List Product'), 'url'=>array('index')),
    array('label' => Yii::t('product', 'Create Product'), 'url' => array('create')),
    array('label' => Yii::t('product', 'Manage Product'), 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('default', 'Update') . ' ' . CHtml::encode($model->name); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>