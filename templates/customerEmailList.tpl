{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Lista de emails de clientes</h2>
    <br>
    <br>

    <textarea cols='40' rows='20' id="codigo">
    {foreach from=$customers item=customer}
    {$customer->email},
    {/foreach}
    </textarea>
    <br>
    <button type="button" id="copyClip" data-clipboard-target="#codigo" class="btn btn-outline-primary">Copiar lista</button>
    <script src="./libs/clipboard/clipboard.min.js"></script>