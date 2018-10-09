<?php
/**
 * Created by PhpStorm.
 * User: szczepano
 * Date: 2018-10-09
 * Time: 18:36
 */

class DomyslnaKlasa extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ustawienia['nazwa'] = "Domyślna strona";
        $this->ustawienia['opis_big'] = "Trafiłeś tu przez przypadek. Strona o podanym adresie nie istnieje.";
    }

    public function indexAction()
    {
        $this->smarty->assign('strona', $this->ustawienia);
        $this->smarty->display('default.tpl');
    }


}