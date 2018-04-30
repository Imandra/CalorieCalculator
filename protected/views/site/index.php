<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/custom.css"); ?>

<?php if(Yii::app()->user->hasFlash('signUp')) : ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('signUp'); ?>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('error')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>

<h1><?php echo Yii::app()->name ?></h1>

<?php if (!Yii::app()->user->isGuest) : ?>
    <?php $this->beginWidget('system.zii.widgets.jui.CJuiDialog',
        array(
            'id' => 'saveDialog',
            'options' => array(
                'title' => Yii::t('product', 'Save'),
                'width' => '300px',
                'modal' => true,
                'buttons' => array(
                    'Добавить' => 'js:function() {$("#Save").submit();}',
                    'Отмена' => 'js:function() {$(this).dialog("close");}'),
                'autoOpen' => false,
            ))); ?>

    <?php echo Yii::t('product', 'Enter product name:'); ?><br/><br/>

    <form id="Save" name="save"
          action="<?php echo $this->createUrl('product/saveAsProduct'); ?>"
          method="post">
        <input type="text" name="Save" style="width: 100%;" title="Название продукта">
    </form>

    <?php $this->endWidget(); ?>
<?php endif; ?>

<div id="calculator">
    <?php $this->renderPartial('_calculator', array('list' => $list, 'positions' => $positions), false, true); ?>
</div>