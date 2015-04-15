<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

use \App;

class UsersController extends AppController {

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                if($_SESSION['role'] === 'admin'){
                    header('Location:index.php?p=admin.posts.index');
                }else{
                    header('Location:index.php?p=posts.index');;
                }

            }else{
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form','errors'));
    }
    public function logout(){
        //session_destroy();
        unset ($_SESSION['auth']);
        unset ($_SESSION['user_id']);
        unset ($_SESSION['pseudo']);
        header('Location:index.php');
    }

    public function like(){
        $this->render('users.like', compact('vote'));
    }


    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');

    }



}