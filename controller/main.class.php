<?php
/**
 * Created by PhpStorm.
 * User: szczepano
 * Date: 2018-10-09
 * Time: 17:43
 */

class Paprica
{
    static $_instance;
    private $members;

    public static function getInstance()
    {

        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function addMember($nazwa, $wartosc)
    {
        if(isset($this->members[$nazwa])) {
            throw new Exception("Jest juz taki member");
        } else {
            $this->members[$nazwa] = $wartosc;
        }
    }

    public function getMember($nazwa)
    {
        if(!isset($this->members[$nazwa])){
            throw new Exception("Nie ma takiego membera");
        } else {
            return $this->members[$nazwa];
        }
    }

    public function startApp()
    {
        require_once(CONTROLLER.'Controller.php');
        require_once(SMARTY . 'Smarty.class.php');
        self::addMember('smarty', new Smarty());
        require_once('config/db.php');
        self::addMember('baza', new Database());

        if (isset($_GET['strona'])) { // mod_rewrite
            $inc = explode('/', rtrim($_GET['strona'], '/')); // strona.pl/klasa/metodainna/argument

            if (file_exists(MODEL . $inc[0] . '.class.php')) { //jak nie ma takiej klasy to
                require_once(MODEL . $inc[0] . '.class.php');
                $class = new $inc[0];

                if (isset($inc[1]) && !empty($inc[1])) {
                    if (method_exists($class, $inc[1] . 'Action')) {
                        if (isset($inc[2])) {
                            $class->{$inc[1] . 'Action'}($inc[2]);
                        } else {
                            $class->{$inc[1] . 'Action'}();
                        }
                    } else {
                        $class->indexAction($inc[1]);
                    }
                } else {
                    $class->indexAction();
                }

            } else {
                require_once(MODEL.'default.class.php');
                $class = new DomyslnaKlasa;
                $class->{'indexAction'}();
            }

        } else {
            require(MODEL.'index.class.php');
            $class = new Index;
            $class->indexAction();
        }
    }

}