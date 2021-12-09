{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Facturas</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="admBillsFilter.tpl"}
<!--end add user menu-->
        </div>
      </div>
      
      
    </container>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">
        <br>
          <input type="button" name="imprimir" class="btn btn-outline-primary" value="Imprimir" onclick="window.print();">
        </div>
        <div class="col">
        <br>
          <form action="reserva" method="GET">
            <a href="javascript:history.back(-1);" class="btn btn-outline-primary">Volver</a>
          </form>
        </div>
      </div>
      <div class="row">
      
    <div class="col">
    </div>
    
      <div class="col">
      <br>
      
    <a href="stock" class="btn btn-outline-primary" role="button">Administrar productos proveedores</a>
    </div>
    <div class="col">
    
      <br>
    <a href="getBills" class="btn btn-outline-primary" role="button">Ver Facturas</a>
    </div>
    <div class="col">
    </div>
    </div>
</container>



<div class="scrollItem">
  <table class="table table-hover table-responsive">
    <thead>
      <tr class="justify-content-center">
        <th scope="col">Fecha  <a href="dashboard"><img src="./img/sort_icon.png" alt="Ordenar alfabeticamente" width="20" heigth="20"></th>
        <th scope="col">Nro. Factura</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Detalles</th>
        <th scope="col">Valor</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$bills item=item}
    <tr class="justify-content-center">
      <th scope="row"><span>{$item->date}</span></th>
      <td>{$item->bill_number}</td>
      <td>{$item->name}</td>
      <td>{$item->detail}</td>
      <td>{$item->price}</td>
      {if $item->payment_status eq 1}
          <td>        
              <span class="badge bg-success">Pagada</span>
          </td>
          {else}
          <td>
              <span class="badge bg-danger">Impaga</span>
          </td>
          <td>
              <form action="payBill" method="GET">
                  <button type="submit" class="btn btn-outline-primary" name="bill" value={$item->id_provider_bill}>Marcar como pagada</button>
              </form>
          </td>
          {/if}
      </tr>
      {/foreach}
      </tbody>
  </table>
</div>
</section>