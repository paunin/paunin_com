<?php

class SiteController extends Controller{
    
	/**
	 * Declares class-based actions.
	 */
	public function actions(){
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
                'class'=>'MyCCaptchaAction',
				'backColor'=>0xFFFFFF,
                'testLimit'=> 7,
                'maxLength'=> 3,
                'minLength'=> 3,
                //'border'=>'solid 1px black'
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
            'index'=>'application.controllers.site.IndexAction',
            'content'=>'application.controllers.site.ContentAction',
            'login'=>'application.controllers.site.LoginAction',
            'blog'=>'application.controllers.site.BlogAction',
            'blogpost'=>'application.controllers.site.BlogPostAction',
            'blogtags'=>'application.controllers.site.BlogTagsAction',
            'cu'=>'application.controllers.site.CUAction',
           
		);
	}
    
    public function filters(){
        return array(
            array(
                'application.controllers.site.filters.Main'
            ),
        );
    }
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else{
   	            $this->render('error', $error);
	    	}
	        	
	    }
	}
}