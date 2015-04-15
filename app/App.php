<?php



use Core\Config;
use Core\Database\MysqlDatabase;

class App
{
    private static $_instance;
    private $db_instance;
    public  $title = 'mon super site';



    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT.'/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT.'/core/Autoloader.php';
        Core\Autoloader::register();

        if (array_key_exists('auth', $_SESSION)) {
            $_COOKIE['auth']    = $_SESSION['auth'];
            $_COOKIE['email']   = $_SESSION['email'];
            $_COOKIE['pseudo']  = $_SESSION['pseudo'];
            $_COOKIE['user_id'] = $_SESSION['user_id'];
        }else { $_COOKIE['auth']= null;}
    }

    public function getTable($name){
        $class_name = '\\App\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance(ROOT.'/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance= new MysqlDatabase($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
        }
        return $this->db_instance;
    }

    public static function login(){
        if(empty ($_SESSION['auth'])) {
            echo '<li><img class="profil" src="http://iconbug.com/data/ca/128/99923a7ff69fc587d4357cf40957745a.png" width="40px"></li>';
            echo '<li> <a href="index.php?p=users.login">Login </a> </li>';
        }else{
            $email = $_SESSION['email'];
            $default = "http://iconbug.com/data/ca/128/99923a7ff69fc587d4357cf40957745a.png";
            $size = 10;
            $avatar = "http://www.gravatar.com/avatar/" . md5($email). "&s=" . $size;
            echo '<li> <img class="profil" src="'.$avatar.'" width="40px"></li>';
            if($_SESSION['role'] === 'admin'){
                echo '<li> <a href="index.php?p=admin.posts.index">'.$_SESSION['pseudo'].' </a> </li>';
            }else{
                echo '<li> <a href="index.php?p=posts.index">'.$_SESSION['pseudo'].' </a> </li>';
            }
            echo '<li> <a href="index.php?p=users.logout">Logout</a></li>';
        }
    }

    public static function cookie()
    {

    }
}