<?php
class AdminRMenuWidget extends CWidget
{
    public $curr_content="index";
    public function init()
    {
        // этот метод будет вызван методом CController::beginWidget()
    }
 
    public function run()
    {      
        
        $this->render(__CLASS__,array());
    }
}