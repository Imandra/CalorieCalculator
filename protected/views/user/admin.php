<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
    Yii::t('user','Users')=>array('index'),
    Yii::t('default','Manage'),
);

$this->menu=array(
    array('label'=>Yii::t('user','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('index')),
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

<h1><?php echo Yii::t('user','Manage User')?></h1>

    <p>
        <?php echo Yii::t('default','You may optionally enter a comparison operator (<, <=, >, >=, <> or =)'.
            ' at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

<?php echo CHtml::link(Yii::t('default','Advanced Search'),'#',array('class'=>'search-button btn', 'style'=>'margin-bottom: 20px')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php Yii::app()->clientScript->registerCss(1, <<<CSS
 .pager {
    margin: 0;
    text-align: left;
    }
 .pager li>a {
    border-radius: 0;
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    }
CSS
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>