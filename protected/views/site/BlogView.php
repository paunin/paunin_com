
<?php $this->beginWidget('application.widgets.tagsCloudWidget', array());?><?php $this->endWidget(); ?>
    


<?php foreach($list as $post):?>
<div class="prev_blog_post">
    <h1><a href="<?=Yii::app()->createUrl('site/blogpost',array('post'=>$post->abbr))?>" class="post_link" title="<?=$post->title;?>"><?=$post->title;?></a></h1>
    <span class="prev_text"><?=$post->preview?></span>
    <div class="prev_footer">
        <span class="prev_date"><?=date('d/m/Y H:i:s',strtotime($post->created_at))?></span>
        <span class="prev_cc"><?=Yii::t('main','Comments')?>:<?=count($post->blogComments)?></span>
    </div>
</div>
<?php endforeach; ?>

<center>
<?php $this->beginWidget('application.widgets.paginatorWidget',array(
            'overall' => $listCount,
            'display' => $displayN,
            'currPage' =>$page,
            'paramName' => 'page',
            'baseUrl'=> Yii::app()->createUrl('site/blog',array('page' => '__page__')),
            'numGroup' => 3
));?><?php $this->endWidget(); ?>
</center>