<?php /* Smarty version Smarty-3.1.14, created on 2018-10-09 20:17:32
         compiled from "styles\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15051131965bbcf0bc853e61-87414625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a245a0fedcd6357ebb89145936ca561cb9cc8a9c' => 
    array (
      0 => 'styles\\default\\index.tpl',
      1 => 1539108722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15051131965bbcf0bc853e61-87414625',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5bbcf0bc886ae8_49880437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbcf0bc886ae8_49880437')) {function content_5bbcf0bc886ae8_49880437($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function(e){
        $("#formularzTestowy").on('submit', function(e){  // po wysłaniu
            e.preventDefault();
            $.ajax({ // ajax
                type: 'POST',
                url: 'index/valid',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.buttonSubmit').attr("disabled","disabled");
                    $('#formularzTestowy').css("opacity",".5");
                },
                success: function(msg){
                    $('.statusZwrotny').html('');
                    if(msg == 'ok'){ // $zapytanie == true
                        $('#formularzTestowy')[0].reset();
                        $('.statusZwrotny').html('<span style="font-size:20px;color:green">Formularz został wysłany prawidłowo.</span>');
                    } else if(msg == 'zapytanie'){ //zapytanie = false
                        $('.statusZwrotny').html('<span style="font-size:20px;color:darkred">Wystąpiły błędy w przesyłaniu formularza. Problem z wysłaniem do bazy.</span>');
                    } else if(msg == 'plik') { // plik ma złe rozszerzenie/typ
                        $('.statusZwrotny').html('<span style="font-size:20px;color:darkred">Wystąpiły błędy w przesyłaniu formularza. Problem z wysłaniem pliku.</span>');
                    } else {
                        $('.statusZwrotny').html('<span style="font-size:20px;color:darkred">Wystąpiły niezidentyfikowane błędy w przesyłaniu formularza. MSG:'+ msg +' XD</span>');
                    }

                    $('#formularzTestowy').css("opacity","");
                    $(".buttonSubmit").removeAttr("disabled");
                }
            });
        });

        $("#file").change(function() { //przy kazdym wyborze
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                alert('Proszę wybrać plik z odpowiednim rozszerzeniem (JPEG/JPG/PNG).');
                $("#file").val('');
                return false;
            }
        });
    });
    
</script>

<h2 class="w3-xxxlarge w3-text-red">Proszę wypełnić formularz.</h2>
<hr style="width:50px;border:5px solid red" class="w3-round">

<form enctype="multipart/form-data" id="formularzTestowy" >
    <div class="w3-section">
        <label for="imie">Imię*</label>
        <input type="text" class="w3-input2 w3-border" id="imie" name="imie" placeholder="Wpisz imię" required />
    </div>
    <div class="w3-section">
        <label for="nazwisko">Nazwisko</label>
        <input type="text" class="w3-input2 w3-border" id="nazwisko" name="nazwisko" placeholder="Wpisz nazwisko" />
    </div>
    <div class="w3-section">
        <label for="file">Plik</label>
        <input type="file" class="w3-input2" id="file" name="file"  />
    </div>
    <p class="statusZwrotny"></p><br />

    <input type="submit" name="submit" class="buttonSubmit w3-button w3-block w3-padding-large w3-red w3-margin-bottom" value="Prześlij formularz!"/>
</form>


<!-- End page content -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>