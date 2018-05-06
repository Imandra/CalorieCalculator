<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Manage User');

$this->breadcrumbs = array(
    //Yii::t('user','Users')=>array('index'),
    Yii::t('default', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('user', 'Create User'), 'url' => array('create')),
    //array('label'=>Yii::t('user','List User'), 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1><?php echo Yii::t('user', 'Manage User') ?></h1>

    <p>
        <?php echo Yii::t('default', 'You may optionally enter a comparison operator (<, <=, >, >=, <> or =)' .
            ' at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

<?php echo CHtml::link(Yii::t('default', 'Advanced Search'), '#', array('class' => 'search-button btn', 'style' => 'margin-bottom: 20px')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template' => "<div class=\"table-container\">{items}\n</div><div class=\"row-fluid\"><div class=\"span8\">{pager}</div><div class=\"span4\">{summary}</div></div>",
    'pager' => array(
        'class' => 'bootstrap.widgets.TbPager',
        'maxButtonCount' => 5
    ),
    'columns' => array(
        'id',
        'username',
        'password',
        'email',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>