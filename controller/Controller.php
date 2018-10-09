<?php
/**
 * Created by PhpStorm.
 * User: szczepano
 * Date: 2018-10-09
 * Time: 18:35
 */
  class Controller {

      private $paprica;
      protected $smarty;
      protected $baza;
      protected $ustawienia;

      public function __construct() {
          $this->paprica = Paprica::getInstance();
          $this->smarty = $this->paprica->getMember('smarty');
          $this->baza = $this->paprica->getMember('baza');
          $this->smarty->setTemplateDir(VIEW.'default');
          $this->smarty->setCompileDir(VIEW.'default/compile/');
          $this->smarty->force_compile=1;
          $this->smarty->debugging = false;
          $this->ustawienia['nazwa'] = "Strona domyślna";
          $this->ustawienia['opis_big'] = "Witaj na domyślnej stronie. Zapraszam do przeglądania xd";
      }
  }