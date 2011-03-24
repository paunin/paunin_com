<div align="center" style="padding: 5px;">
    <a id="sh_link" title="Show/Hide form" href="#" onclick="$('.forma').toggleClass('hhh');return false;">Show/Hide form</a>
    
    <script type="text/javascript">
        $(document).ready(function(){
           <?php if(!($_GET['id']||$_GET['new'])):?> $('.forma').addClass('hhh');<?php endif;?>
        })
    </script>
</div>
<?=$blogPostForm?>
<span class="name"><span class="name_in">Список страниц</span></span>

<table class="list" cellpadding="3" cellspacing="3">
    <tr>
        <th width="20">
            ID
        </th>
        <th>
            Название
        </th>
        <th width="70">
            Действия
        </th>
    </tr>
<?php 
    if(count($list))
        foreach($list as $blogPost): ?>
    <tr>
        <td>
            <?= $blogPost->id?>
        </td>
        <td>
           <?= $blogPost->title?>
        </td>
        <td>
            <a href="<?= Yii::app()->createUrl('admin/blogPost', array('id'=>$blogPost->id)) ?>" title="редактировать"><img alt="редактировать" src="/images/icons/edit.png" /></a>
            <a href="<?= Yii::app()->createUrl('admin/blogPost', array('id_delete'=>$blogPost->id)) ?>" title="удалить" onclick="return confirm('Правда удалить?');"><img alt="удалить" src="/images/icons/delete.png" /></a>
        </td>
    </tr>  
<?php   endforeach;?>
</table>
<p align="right"><a href="<?= Yii::app()->createUrl('admin/blogPost',array('new'=>true)) ?>" title="Новая запись" ><img alt="+" src="/images/icons/plus.png" /></a>
</p>
<center>
<?php $this->beginWidget('application.widgets.paginatorWidget',array(
            'overall' => $listCount,
            'display' => $displayN,
            'currPage' =>$page,
            'paramName' => 'page',
            'baseUrl'=> Yii::app()->createUrl('admin/blogPost',array('page' => '__page__')),
            'numGroup' => 3
));?><?php $this->endWidget(); ?></center>
<br />
