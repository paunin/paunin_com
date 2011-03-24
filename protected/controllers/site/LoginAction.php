<?php
/**
* Залогинивание
* 
* @author Паунин Дмитрий
* @package 4.0
*/
class LoginAction extends Action
{
    public $form=NULL;

    
    public function init()
    {       
        $this->form=new login;
        if(isset($_POST['login']))
        {
            $this->form->attributes=$_POST['login'];
            
            if($this->form->validate())
            {
                if($this->form->save()){
                    $this->form=new login;
                    $_GET['go_back_t']=$_GET['go_back'];
                    return true;
                    
                }else{
                    return false;
                }
            }
        }elseif($_GET['logout'])
            Yii::app()->user->logout();
       
    }
    
    public function run()
    {
        if(!Yii::app()->user->checkAccess('admin')){
            $lForm=$this->controller->renderPartial('/forms/login',array('model'=>$this->form),true);
        }else{
            $lForm=$this->controller->renderPartial('/forms/logout',array(),true);
        }
            
        $this->controller->title='Авторизация Админа';        
        $this->controller->render('login', array('loginForm'=>$lForm));
    }

}

