<?php
class CUAction extends Action
{    
    public function run()
    {
        $this->controller->title='Ermm I can see U';
        $this->controller->render('cu');
    }
}