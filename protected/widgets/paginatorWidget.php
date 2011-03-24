<?php

/**
 * Виджет вывода номеров страниц
 * 
 * @package 
 * @author Паунин дмитрий
 * @copyright 2010
 * @version 4.0
 * @access public
 */
class paginatorWidget extends CWidget
{ 
    /**
    * Определение базовой части пути к файлам вида виджета
    * 
    * @var string
    */
    public $path = __CLASS__;
    
    /**
    * всего 0 позиций
    * 
    * @var int
    */
    public $overall = 0;
    /**
    * показывать на странице 20 штук
    * 
    * @var int
    */
    public $display = 20; 
    /**
    * текущая страница 1
    * 
    * @var int
    */
    public $currPage = 0;
    /**
    * название параметра в URL page=0
    * 
    * @var string
    */
    public $paramName = 'page';
    /**
    *  группировать по 3
    * 
    * @var int
    */
    public $numGroup = 3; 
    /**
    *  Базовый URL для подстановки страницы
    * 
    * @var string
    */
    public $baseUrl = '__page__'; 
    /**
    * Запуск виджета
    */
    public function run()
    {        
        return $this->render(__CLASS__, array(
            'overall' => $this->overall,
            'display' => $this->display,
            'currPage' => $this->currPage,
            'paramName' => $this->paramName,
            'numGroup' => $this->numGroup,
            'baseUrl' => $this->baseUrl,
        ));
    }
}