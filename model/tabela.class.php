<?php
/**
 * Created by PhpStorm.
 * User: szczepano
 * Date: 2018-10-09
 * Time: 19:29
 */

class Tabela extends Controller
{
    private $template = 'tabela.tpl';

    public function __construct()
    {
        parent::__construct();
        $this->ustawienia['nazwa'] = "Tabela z danymi.";
        $this->ustawienia['opis_big'] = "W tej tabeli znajdują się dane wysłane przez formularz. Dane są zabezpieczone hasłem przed dostępem.";
    }

    public function indexAction(){

        if(isset($_POST['formularz'])){
            if($_POST['login'] == LOGIN && $_POST['haslo'] == HASLO){
                $dane = $this->baza->query("SELECT * FROM `".PREFIX."data`")->fetchAll();
                $this->smarty->assign('dane', $dane);
                $this->smarty->assign('strona', $this->ustawienia);
                $this->smarty->display($this->template);
            } else {
                $this->ustawienia['opis_big'] = "Błędne dane logowania. Wpisz poprawne";
                $this->smarty->assign('strona', $this->ustawienia);
                $this->smarty->display('tabela2.tpl');
            }
        } else {
            $this->smarty->assign('strona', $this->ustawienia);
            $this->smarty->display('tabela2.tpl');
        }

    }

}