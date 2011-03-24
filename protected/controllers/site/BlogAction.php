<?php

class BlogAction extends Action
{    
    public $form=NULL;
    private $list=null;
    public $listCount=null;
    public $displayN=30;
    public $page=0;
    
    public function run()
    {

        $criteria=new CDbCriteria;
        
        
        $this->controller->title='Блог';
        $this->content_abbr='blog';
        
        $this->page=(int)$_GET['page']?(int)$_GET['page']:0;
        
    
        $this->list=new BlogPost($criteria);
        $this->listCount = $this->list->count();
        
        $criteria->select='abbr,preview,title,created_at ';  
        $criteria->order='created_at DESC';
        $criteria->limit=$this->displayN;
        $criteria->offset=$this->displayN*$this->page;
        $this->list=$this->list->with('blogComments')->findAll($criteria);
        
        $this->controller->render('BlogView',array('list'=>$this->list,'displayN'=>$this->displayN,'listCount'=>$this->listCount,'page'=>$this->page,), null);

        
    }
}