{include file="header.tpl"}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    {literal}
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
                    } else if(msg == 'imie') {
                        $('.statusZwrotny').html('<span style="font-size:20px;color:darkred">Wystąpiły błędy w przesyłaniu formularza. Pole imię nie może być puste.</span>');
                    } else {
                        $('.statusZwrotny').html('<span style="font-size:20px;color:darkred">Wystąpiły niezidentyfikowane błędy w przesyłaniu formularza. Błąd:'+ msg +' </span>');
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
    {/literal}
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
{include file="footer.tpl"}