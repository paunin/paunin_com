<?php

class BlogPostAction extends Action
{    
   
    public function run()
    {
        
        $criteria=new CDbCriteria;
        
        $this->content_abbr='blog';
        
        $blogPost=BlogPost::model()->find('abbr=:abbr',array(':abbr'=>$_GET['post']));
        if(!$blogPost){
            throw new CHttpException(404,Yii::t('main','Content not found. Check URL please.'));
        }
        $this->controller->title=$blogPost->title.' - Блог';
       //comments and form
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/lib/tiny_mce/jquery.tinymce.js');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/lib/tiny_mce/small_tiny_init.js');
        
        $model = new BlogComment;
        if(isset($_POST['ajax']) && $_POST['ajax']==='blog-comment-BlogComment-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['BlogComment']))
        {
            $model->attributes=$_POST['BlogComment'];
            $model->post_id=$blogPost->id;
            if($model->validate()){
                $cookie=new CHttpCookie('comment_name',$model->name);
                Yii::app()->request->cookies['comment_name']=$cookie;
                $cookie=new CHttpCookie('comment_mail',$model->mail);
                Yii::app()->request->cookies['comment_mail']=$cookie;
                $model->save();
                unset($_POST['BlogComment']);
                $model = new BlogComment;
                
            }
        }
            $model->name=Yii::app()->request->cookies['comment_name']->value;
            $model->mail=Yii::app()->request->cookies['comment_mail']->value;

            //$model->name=Yii::app()->request->cookies[]

        
        $form=$this->controller->renderPartial('/forms/BlogComment',array('model'=>$model),true);             
        $this->controller->render('BlogPostView',array('blogPost'=>$blogPost,'form'=>$form), null);

        
    }
}