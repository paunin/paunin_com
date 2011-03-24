<?php require_once('inc/header.php'); ?>
<div id="container">
    <div id="l_div">
        <div id="site_pre_title" class="ufont">
        </div><div id="site_title" class="ufont">
            <a href="/" class="nd" title="<?=Yii::t('main','Paunin Dmitriy')?>"><?=Yii::t('main','Paunin Dmitriy')?></a>
        </div><div id="site_under_title" class="ufont">
            <?=Yii::t('main','original business solutions')?>
        </div>
        <div id="main_container">
       <?=$content?>

       </div>
            </div><div id="r_div" class="ufont">

    <?php $this->beginWidget('application.widgets.AdminRMenuWidget', array());?><?php $this->endWidget(); ?>

    </div>
    <div id="footer_div" class="ufont">
      <a href="<?=Yii::app()->createUrl('site/login',array('logout'=>'true'))?>" class="nd" title="Выйти">Выйти [<?=$_SERVER['REMOTE_ADDR']?>]</a> 
          </div>
</div>
<?php require_once('inc/footer.php'); ?>