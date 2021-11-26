{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Administración</h2>
<br>

<br>
<h5 class="mb-3 alert alert-primary">Finanzas</h5>
{include file="billingReportFilter.tpl"}

<br>
<h5 class="mb-3 alert alert-primary">Altas, bajas y modificaciones</h5>
<container class="text-center">
    <div class="d-grid gap-2">
    <a href="admUsers" class="btn btn-outline-primary" role="button">Administrar usuarios</a>
    <a href="admProviders" class="btn btn-outline-primary" role="button">Administrar proveedores</a>
    <a href="admCustomers" class="btn btn-outline-primary" role="button">Administrar clientes</a>
    <a href="admSalesChannel" class="btn btn-outline-primary" role="button">Administrar canales de venta</a>
    </div>
</container>


<br>
<h5 class="mb-3 alert alert-primary">Generar</h5>
<container class="text-center">
    <div class="d-grid gap-2">
        <div class="alert alert-dismissible alert-primary">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Podés generar una lista de emails de proveedores y/o clientes para realizar acciones de marketing, como ofrecer promociones o fidelizar antiguos clientes a traves de correo electrónico
        </div>
        <a href="listaEmailsHuespedes" class="btn btn-outline-primary" role="button">Lista de emails</a>
        <!--
        <p>Carta de bienvenida</p>
        <p>Resumen de cuenta</p>
        -->
    </div>
    <br>

</container>