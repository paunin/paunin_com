<?php require_once('inc/header.php'); ?>
<div id="container">
    <div id="l_div">
        <div id="site_pre_title" class="ufont">
            <div id="set_lang"><?php
$llar=array();
foreach(Yii::app()->params['allowLang'] as $lang=>$lg):

$llar[]='<a href="'.($_SERVER['REQUEST_URI']!='/'? preg_replace('/^.{3}\//','/'.$lg.'/',$_SERVER['REQUEST_URI']):'/'.$lg.'/').'" class="'.(Yii::app()->language==$lg?'curr_lang':'').'" title="'.Yii::t('main',$lang).'">'.strtoupper($lg).'</a>';

endforeach;
echo implode('|',$llar);
?></div>
        </div><div id="site_title" class="ufont">
            <a href="/" class="nd" title="<?=Yii::t('main','Dmitriy Paunin')?>"><?=Yii::t('main','Dmitriy Paunin')?></a>
        </div><div id="site_under_title" class="ufont">
            <?=Yii::t('main','Original Business Solutions')?>
        </div>
        <div id="main_container">
       <?=$content?>

       </div>
            </div><div id="r_div" class="ufont">

    <?php $this->beginWidget('application.widgets.rMenuWidget', array('curr_content'=>(isset($this->action->content_abbr)?$this->action->content_abbr:'')));?><?php $this->endWidget(); ?>
    
   
   
    </div>
    <div id="footer_div" class="ufont">
    <a href="/" title="(c)" class="nd"><?=Yii::t('main','Copyright')?>(C)<?=date('Y').' '.Yii::app()->name?></a> 
    
    </div>


    
</div>
<?php require_once('inc/footer.php'); ?>
