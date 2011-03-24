<?php

class BlogPostAction extends Action
{    
    
    public $form=NULL;
    private $list=null;
    public $listCount=null;
    public $displayN=30;
    public $page=0;
    
     
    public function init()
    {    
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/lib/tiny_mce/jquery.tinymce.js');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/lib/tiny_mce/big_tiny_init.js');
         // uncomment the following code to enable ajax-based validation
        $this->form=new BlogPost;
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='blog-post-blogPost-form'){
            echo CActiveForm::validate($this->form);
            Yii::app()->end();
        }
        
        
        
        if($_GET['id']){
            $tform=$this->form->findByPk($_GET['id']);
            if($tform)
                $this->form=$tform;
        }
            

        
        if(isset($_POST['BlogPost'])){
            $this->form->attributes=$_POST['BlogPost'];
            $this->form->tags = mb_strtolower($this->form->tags,'utf-8');
            if($this->form->validate())
            {
                
                $this->form->save();
                //BlogPostTag::model()->delete('post_id=?',array($this->form->id));
                BlogPostTag::model()->deleteAll('post_id=?',array($this->form->id));
                if($this->form->tags){
                    $tags = explode(',',$this->form->tags);
                    foreach($tags as $tag){
                        $ttag=trim($tag);
                        $ctag = BlogTag::model()->find('tag=?',array($tag));
                        if(!$ctag){
                            $ctag=new BlogTag();
                            $ctag->tag = $tag;
                            $ctag->save();    
                        }

                        $bpt=new BlogPostTag();
                        $bpt->tag_id=$ctag->id;
                        $bpt->post_id=$this->form->id;
                        $bpt->save();
                    
                        
                    }
                }
                
                if(!$tform)
                    $this->form=new BlogPost;
                return;
            }
        }
    }
    
    public function run()
    {
        $this->controller->title='Управление записями блога';
        
        $this->page=(int)$_GET['page']?(int)$_GET['page']:0;
        
        if($_GET['id_delete']){
            $this->list=new BlogPost;
            $to_del=$this->list->findByPk($_GET['id_delete']);
            if($to_del)
                $to_del->delete();
        }
        $this->list=new BlogPost;
        $this->listCount = $this->list->count();
        $this->list=$this->list->findAll(array('limit'=>$this->displayN,'offset'=>$this->displayN*$this->page,'order'=>'id DESC'));
        
        $this->controller->render('blogPost',array('list'=>$this->list,'displayN'=>$this->displayN,'listCount'=>$this->listCount,'page'=>$this->page,'blogPostForm'=>$this->controller->renderPartial('/forms/blogPost',array('model'=>$this->form),true)), null);
        
    }
}
