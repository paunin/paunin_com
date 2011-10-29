<?php


class Main extends CFilter
{
    /**
    * Код выполняемый до, всех действий контроллера.
    * Возвращает true, в случаях, когда действиям,
    * можно продолжать выполняться и false, когда нет.
    * 
    * @param mixed $filterChain
    * @return boolean
    */
    protected function preFilter($filterChain)
    {   
        //if($filterChain->controller->cookie->data['User']['lastseen'])     
        return true;
    }
 
    /**
    * Код выполняемый, после всех действий контроллера.
    * Именно тот метод производит вывод в поток.
    * 
    * @param mixed $filterChain
    */
    protected function postFilter($filterChain)
    {
       
    }
}
