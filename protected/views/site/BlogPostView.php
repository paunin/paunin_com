<div class="post_title">
    <h1><?=$blogPost->title?></h1>
    <div class="post_info">
       <span class="post_date"><?=date('d/m/Y H:i:s',strtotime($blogPost->created_at))?></span>
       <span class="post_cc"><a title="<?=Yii::t('main','Read Comments')?>" href="#" onclick="scrollto('post_comments');return false;"><?=Yii::t('main','Comments')?>:<?=count($blogPost->blogComments)?></a></span>
    </div>
</div><div class="post-view">
<?=$blogPost->text?></div>
<?=$this->renderPartial('sharepanel',array('title'=>$blogPost->title))?>


<div id="post_comments">
    <?php foreach($blogPost->blogComments as $comment):?>
    <div class="post_comment"> 
        <div class="comment_name">
            <?=$comment->name?>
            <span class="comment_date" >
                [<?=date('d/m/Y H:i:s',strtotime($comment->created_at))?>]
            </span>       
        </div>
        <div class="comment_text"><?=$comment->text?>
        <?php 
            if(Yii::app()->user->checkAccess('admin')){
        ?><br/><br/>[x]
        <?php 
        }
        ?>
        </div>
    </div>
    <?php endforeach;?>
</div>

<?=$form?>
