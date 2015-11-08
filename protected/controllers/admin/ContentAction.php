<?php

class ContentAction extends Action
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
        $this->form=new Content;
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='content-content-form')
        {
            echo CActiveForm::validate($this->form);
            Yii::app()->end();
        }
        
        
        
        if(!empty($_GET['id'])){
            $tform=$this->form->findByPk($_GET['id']);
            if($tform)
                $this->form=$tform;
        }
            
        
        
        if(isset($_POST['Content'])){
           
            $this->form->attributes=$_POST['Content'];
            
            if($this->form->validate())
            {
                $this->form->save();
                if(!$tform)
                    $this->form=new Content;
                return;
            }
        }
    }
    
    public function run()
    {
        $this->controller->title='Управление страницами';
        
        $this->page=!empty($_GET['page'])?(int)$_GET['page']:0;
        
        if(!empty($_GET['id_delete'])){
            $this->list=new Content;
            $to_del=$this->list->findByPk($_GET['id_delete']);
            if($to_del)
                $to_del->delete();
        }
        $this->list=new Content;
        $this->listCount = $this->list->count();
        $this->list=$this->list->findAll(array('limit'=>$this->displayN,'offset'=>$this->displayN*$this->page));
        
        $this->controller->render('content',array('list'=>$this->list,'displayN'=>$this->displayN,'listCount'=>$this->listCount,'page'=>$this->page,'contentForm'=>$this->controller->renderPartial('/forms/content',array('model'=>$this->form),true)), null);
        
    }
}
