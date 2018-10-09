<?php
 
 // w sumie to zajebane od pretty_number ale jest ok :_

function smarty_modifier_liczba($liczba, $poprzecinku = 0, $poprzecinku_znak=",", $cotysiac = ".")
{
    return number_format($liczba,$poprzecinku,$poprzecinku_znak,$cotysiac);
}


?> 