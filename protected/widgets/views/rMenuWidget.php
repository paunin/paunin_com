<span id="contents"><?=Yii::t('main','Contents')?>:</span><ul class="menu">  
        
      
      <?php
         $i=0;
            foreach($contents as $item): 
             $i+=1;
      ?>
        <li>
             <a href="<?=Yii::app()->createUrl('site/content',array('content'=>$item['abr']))?>" class="<?=($curr_content==$item['abr'])?'sel':''?>" title="<?=$item['name']?>"><?=$i?>. <?=$item['name']?></a>
        </li>
      <?php
            endforeach;
      ?> 
    </ul>