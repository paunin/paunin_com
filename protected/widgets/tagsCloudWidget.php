<?php
class tagsCloudWidget extends CWidget
{
    public $tags_count=array();
    public $overall=0;
    public function init()
    {
        // этот метод будет вызван методом CController::beginWidget()
    }
 
    public function run()
    {
        
        $tags=BlogTag::model()->findAll();
        foreach($tags as $tag){
            $tags_count[$tag->id] = (count($tag->blogPosts));
            $overall+=$tags_count[$tag->id];
        }
        $this->render(__CLASS__,array('tags'=>$tags,'overall'=>$this->overall,'tags_count'=>$this->tags_count));
    }
}