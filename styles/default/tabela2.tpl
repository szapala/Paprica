{include file="header.tpl"}


  <div class="w3-container" id="contact" style="margin-top:35px">
      <form action="tabela" method="POST">
          <div class="w3-section">
              <label>Login</label>
              <input class="w3-input w3-border" type="text" name="login" required>
          </div>
          <div class="w3-section">
              <label>Hasło</label>
              <input class="w3-input w3-border" type="password" name="haslo" required>
          </div>
          <button type="submit" name="formularz" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Zaloguj się</button>
      </form>
  </div>


<!-- End page content -->
{include file="footer.tpl"}