<?php
/* @var $this DiaryController */
/* @var $model Diary */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('diary', 'Diary');

$this->breadcrumbs=array(
	//'Diaries'=>array('index'),
    Yii::t('diary','Diary'),
);

/*$this->menu=array(
	array('label'=>'List Diary', 'url'=>array('index')),
	array('label'=>'Create Diary', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#diary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('diary','Manage Diary') . ': ' . ucfirst(Yii::app()->user->name); ?></h1>

<p>
    <?php echo Yii::t('default','You may optionally enter a comparison operator (<, <=, >, >=, <> or =)'.
        ' at the beginning of each of your search values to specify how the comparison should be done.') ?>
</p>

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
	'id'=>'diary-grid',
	'dataProvider'=>$model->search(),
    'type' => TbHtml::GRID_TYPE_BORDERED,
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'date',
            'type' => 'raw',
            'value' => '$data->date',
        ),
        array(
            'name' =>'day_of_week',
            'type' => 'raw',
            'value' => '$data->day_of_week',
        ),
        array(
            'name' =>'calories_per_day',
            'type' => 'raw',
            'value' => '$data->calories_per_day',
        ),
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
		),*/
	),
)); ?>