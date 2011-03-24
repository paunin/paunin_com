<?php
class rMenuWidget extends CWidget
{
    public $curr_content="index";
    public function init()
    {
        // этот метод будет вызван методом CController::beginWidget()
    }
 
    public function run()
    {

        // этот метод будет вызван методом CController::endWidget()
        $criteria=new CDbCriteria;
        $criteria->select='abr,'. Yii::app()->language.'_name AS name';  
        $criteria->condition='active=:active';
        $criteria->params=array(':active'=>'y');
        $criteria->order='prior';
        $contents=Content::model()->findAll($criteria); // $params не требуется
        
        
        
        $this->render(__CLASS__,array('contents'=>$contents,'curr_content'=>$this->curr_content));
    }
}