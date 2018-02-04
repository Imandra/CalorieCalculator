<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('default', 'Error');
$this->breadcrumbs = array(
    Yii::t('default', 'Error'),
);
?>
<div>

<h2><?php echo Yii::t('default', 'Error') . ' ' . $code; ?></h2>
    <?php echo CHtml::encode($message); ?>

</div>