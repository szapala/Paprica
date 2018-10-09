<?php /* Smarty version Smarty-3.1.14, created on 2018-10-09 20:05:39
         compiled from "styles\default\tabela2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3736268325bbcedf3936745-31411893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52f38d93f41ad48c0eb41f8460614d8b1a5db583' => 
    array (
      0 => 'styles\\default\\tabela2.tpl',
      1 => 1539089066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3736268325bbcedf3936745-31411893',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5bbcedf39616d3_44249179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbcedf39616d3_44249179')) {function content_5bbcedf39616d3_44249179($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>