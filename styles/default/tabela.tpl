{include file="header.tpl"}
<style type="text/css">
    {literal}
        .w3-container tr{
            border: 3px outset #ffffff;
            margin: 2 3 4 5px;
            background-color: gainsboro;
        }
        .w3-container td{
            border: 1px outset #000000;
        }
    {/literal}
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
        {foreach from=$dane item=rekord}
            <tr>
                <td>{$rekord['id']}</td>
                <td>{$rekord['imie']}</td>
                <td>{$rekord['nazwisko']}</td>
                <td>{if $rekord['plik'] != ''}
                        <a href="upload/{$rekord['plik']}"</a>{$rekord['plik_short']}
                    {else}
                        Brak pliku
                    {/if}
                </td>
            </tr>
      {/foreach}
    </table>
</div>

<!-- End page content -->
{include file="footer.tpl"}