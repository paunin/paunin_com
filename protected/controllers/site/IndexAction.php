<?php
class IndexAction extends Action
{    
    public function run()
    {
        $this->controller->title='Главная страница';
        $this->controller->render('index');
    }
}