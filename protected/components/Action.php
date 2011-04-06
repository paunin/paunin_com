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