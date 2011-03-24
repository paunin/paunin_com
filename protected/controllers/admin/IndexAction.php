<?php
class IndexAction extends Action
{    
    public function run()
    {
        $this->controller->title='[A] Главная страница';
        $this->controller->render('index');
    }
}