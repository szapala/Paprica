<?php /* Smarty version Smarty-3.1.14, created on 2018-10-09 20:17:25
         compiled from "styles\default\tabela.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12594290645bbcf0b5ca2d70-44892251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebdd614c2b17aefb6eed06860184b089c4f34d60' => 
    array (
      0 => 'styles\\default\\tabela.tpl',
      1 => 1539109041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12594290645bbcf0b5ca2d70-44892251',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dane' => 0,
    'rekord' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5bbcf0b5cd9881_07463751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbcf0b5cd9881_07463751')) {function content_5bbcf0b5cd9881_07463751($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    
        .w3-container tr{
            border: 3px outset #ffffff;
            margin: 2 3 4 5px;
            background-color: gainsboro;
        }
        .w3-container td{
            border: 1px outset #000000;
        }
    
</style>

</div>

<div class="w3-container" id="contact" style="margin-top:75px">
    <table>
        <tr>
            <td>ID</td>
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>Załączony obraz</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['rekord'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rekord']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dane']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rekord']->key => $_smarty_tpl->tpl_vars['rekord']->value){
$_smarty_tpl->tpl_vars['rekord']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['rekord']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rekord']->value['imie'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rekord']->value['nazwisko'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['rekord']->value['plik']!=''){?>
                        <a href="upload/<?php echo $_smarty_tpl->tpl_vars['rekord']->value['plik'];?>
"</a><?php echo $_smarty_tpl->tpl_vars['rekord']->value['plik_short'];?>

                    <?php }else{ ?>
                        Brak pliku
                    <?php }?>
                </td>
            </tr>
      <?php } ?>
    </table>
</div>

<!-- End page content -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>