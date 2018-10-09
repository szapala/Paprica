<?php
/**
 * Created by PhpStorm.
 * User: szczepano
 * Date: 2018-10-09
 * Time: 18:42
 */
header("Cache-Control: no-cache");
header("Pragma: no-cache");
class Index extends Controller
{
    private $template = 'index.tpl';

    public function __construct()
    {
        parent::__construct();
        $this->ustawienia['nazwa'] = "Strona domowa";
        $this->ustawienia['opis_big'] = "Witaj na stronie głównej tej małej aplikacji z wielkimi możliwościami. Zapraszam do przeglądania.";
    }

    public function indexAction()
    {
        $this->smarty->assign('strona', $this->ustawienia);
        $this->smarty->display($this->template);
    }

    public function validAction()
    {
        $imie = $_POST['imie'] ?? 'brak';
        $nazwisko = $_POST['nazwisko'] ?? 'brak';

        if($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0){ //plik ma wage 0 i nie po błędzie
            $plik = $_FILES['file'];
        } else {
            $plik = 'brak';
        }

        $imie = filter_var($imie, FILTER_SANITIZE_STRING);
        $nazwisko = filter_var($nazwisko, FILTER_SANITIZE_STRING);

        $validePlik = false;

        if($plik != 'brak'){
            if($plik["type"] == "image/png" || $plik["type"] == "image/jpeg" || $plik["type"] == "image/jpg"){
                $validePlik = true;
            }
        } else {
            $validePlik = true;
        }

        if($imie != 'brak'){

            if(($validePlik == true) && $plik!='brak'){
                $nazwaPliku = time().'_'.$plik['name'];
                $sciezka = 'upload/'.$nazwaPliku;
                if(move_uploaded_file($plik["tmp_name"], $sciezka)){
                    $prepare = $this->baza->prepare("INSERT INTO `".PREFIX."data` (imie, nazwisko, plik, plik_short) VALUES (:imie, :nazwisko, :plik, :plik_short)");
                    $prepare->bindParam(':imie', $imie);
                    $prepare->bindParam(':nazwisko', $nazwisko);
                    $prepare->bindParam(':plik', $nazwaPliku);
                    $prepare->bindParam(':plik_short', $plik['name']);
                    $zapytanie = $prepare->execute();

                    if($zapytanie == true){
                        $statusMsg = 'ok';
                    } else {
                        $statusMsg = 'zapytanie';
                    }
                }

            } else if($plik == 'brak'){

                $prepare = $this->baza->prepare("INSERT INTO `".PREFIX."data` (imie, nazwisko, plik_short) VALUES (:imie, :nazwisko,  'brak')");
                $prepare->bindParam(':imie', $imie);
                $prepare->bindParam(':nazwisko', $nazwisko);
                $zapytanie = $prepare->execute();

                if($zapytanie == true){
                    $statusMsg = 'ok';
                } else {
                    $statusMsg = 'zapytanie';
                }

            } else {
                $statusMsg = 'plik';
            }

        } else {
            $statusMsg = 'imie';
        }

        echo $statusMsg;
    }

}