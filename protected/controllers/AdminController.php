<?php

class AdminController extends Controller{

    public function init(){
        $this->layout='//layouts/admin';
    }
    /**
     * Declares class-based actions.
     */
    public function actions(){
            return array(
        'index'=>'application.controllers.admin.IndexAction',
        'content'=>'application.controllers.admin.ContentAction',
        'blogPost'=>'application.controllers.admin.BlogPostAction',
        //'lab'=>'application.controllers.site.LabAction',
            );
    }
    
    public function filters(){
        return array(
            array(
                'application.controllers.admin.filters.Main'
            ),
        );
    }
}