<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/style.css"); ?>
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => '<img src ="' . Yii::app()->request->baseUrl . '/images/logo.png">',
    'brandOptions'=>array('style' => 'padding: 0 20px;'),
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items' => array(
                array('label' => Yii::t('default', 'Home'), 'url' => array('/site/index')),
                array('label' => Yii::t('default', 'About'), 'url' => array('/site/page', 'view' => 'about')),
                /*array('label' => Yii::t('default', 'Contact'), 'url' => array('/site/contact')),*/
                array('label' => Yii::t('product', 'Products'), 'url' => array('/product/create'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => Yii::t('dailyReport', 'Daily Report'), 'url' => array('/dailyReport/admin'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => Yii::t('user', 'Users'), 'url' => array('/user/create'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => Yii::t('default', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::t('default', 'Logout').' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container">
    <div>
        <?php if (isset($this->breadcrumbs)): ?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif ?>
    </div>

    <?php echo $content; ?>

    <div>
        <hr>
        <footer>
            <?php echo Yii::powered() ?><br/>
            <?php echo date('Сегодня: d.m.Y ' . Yii::app()->params['days'][date('N')]); ?>
        </footer>
    </div>
</div><!--container-->
</body>
</html>
