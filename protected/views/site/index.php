<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<?php if (Yii::app()->user->hasFlash('signUp')) : ?>
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

<div class="row">
    <div class="span8">
        <h1><?php echo Yii::app()->name ?></h1>
        <hr>
        <p class="about">
            С помощью данного калькулятора вы можете рассчитать калорийность вашего рациона питания. Также
            вычисляется общее количество белков, жиров и углеводов.
        </p>
        <p class="about">
            Выберите из списка нужный вам продукт и он автоматически добавится к расчету. По умолчанию приводятся данные
            на 100 г. Изменить вес продукта можно в соответствующем поле при помощи кнопок "уменьшить" или "увеличить",
            а удалить продукт из расчета кнопкой "Х".
        </p>
    </div>
    <div class="span4">
        <img src="<?php echo Yii::app()->request->baseUrl . '/images/cat.png' ?>" class="cat-img">
    </div>
</div>

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