<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl . '/images/favicon.ico'; ?>"
          type="image/x-icon">
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/font-awesome/css/font-awesome.min.css"); ?>
    <?php Yii::app()->bootstrap->register(); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/style.css"); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => '<i class="fa fa-calculator logo" aria-hidden="true"></i><span class="logo-text">Calorie Calculator</span>',
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => Yii::t('default', 'Home'), 'url' => array('/site/index')),
                //array('label' => Yii::t('default', 'About'), 'url' => array('/site/page', 'view' => 'about')),
                //array('label' => Yii::t('default', 'Contact'), 'url' => array('/site/contact')),
                array('label' => Yii::t('product', 'Products'), 'url' => array('/product/create'), 'visible' => Yii::app()->user->checkAccess('user')),
                array('label' => Yii::t('dailyReport', 'Daily Report'), 'url' => array('/dailyReport/admin'), 'visible' => Yii::app()->user->checkAccess('user')),
                array('label' => Yii::t('user', 'Users'), 'url' => array('/user/create'), 'visible' => Yii::app()->user->checkAccess('administrator')),
                array('label' => Yii::t('default', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::t('default', 'Sign Up'), 'url' => array('/site/signUp'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::t('default', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => Yii::app()->user->checkAccess('user'))
            ),
        ),
    ),
)); ?>

<div class="container">
    <div>
        <?php if (isset($this->breadcrumbs)): ?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'homeLink' => CHtml::link(Yii::t('default', 'Home'), Yii::app()->homeUrl),
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
