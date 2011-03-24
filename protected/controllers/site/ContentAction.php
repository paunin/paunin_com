<?php

class ContentAction extends Action
{    
    public function run()
    {
        if (!$_GET['content']){
            $_GET['content']='index';
            //throw new CHttpException(404,Yii::t('main','Content not found. Check URL please.'));       
        }    
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
         $this->content_abbr=$_GET['content'];    
        // этот метод будет вызван методом CController::endWidget()
        $criteria=new CDbCriteria;
        $criteria->select='abr,'. Yii::app()->language.'_name AS name,'. Yii::app()->language.'_text AS text';  
        $criteria->condition='active=:active AND abr=:abr';
        $criteria->params=array(':active'=>'y',':abr'=>$this->content_abbr);
        $criteria->order='prior';
        $content=Content::model()->find($criteria); // $params не требуется
        
        $this->controller->title=$content->name;
        $this->controller->render('content',array('content'=>$content));
        
    }
}