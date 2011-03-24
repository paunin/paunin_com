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
        if(Yii::app()->user->checkAccess('admin')){
            return true;
        }else{
           Yii::app()->request->redirect(Yii::app()->createUrl(Yii::app()->user->loginUrl)); 
        }
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
