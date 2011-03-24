<?php
/**
 * Компонент действия, от которого наследуются все действия
 * содержит основные модели представления, которые необходимо
 * учитывать при построении сайта.
 * 
 * @author Паунин Дмитрий
 * @package 1.0
 */
 
class Action extends CAction
{
    
    public $content_abbr='index';
    public function __construct($controller, $id)
     {
        parent::__construct($controller, $id);
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/cufon/cufon-yui.js');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/cufon/b52.js');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/cufon/initb52.js');
        $cs->registerScriptFile(Yii::app()->getRequest()->getBaseUrl(true).'/js/common.js');
        $cs->registerCssFile(Yii::app()->getRequest()->getBaseUrl(true).'/css/main.css');
        
       
        $this->init();
     }  
     
     /**
     * Метод инициализации действия, и подготовки его для работы!
     * 
     */
     public function init()
     {
     }
          
     /**
     * Метод запуска действия, обязателен!
     * 
     */
     public function run()
     {
        
     } 
         
}