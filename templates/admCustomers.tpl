{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Administrar clientes</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="customerFilter.tpl"}
<!--end add user menu-->
        </div>
      </div>
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="addCustomer.tpl"}
<!--end add user menu-->
        </div>
      </div>

            <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="addCategory.tpl"}
<!--end add user menu-->
        </div>
      </div>

    </container>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">
          <input type="button" name="imprimir" class="btn btn-outline-primary" value="Imprimir" onclick="window.print();">
        </div>
        <div class="col">
          <form action="reserva" method="GET">
            <a href="javascript:history.back(-1);" class="btn btn-outline-primary">Volver</a>
          </form>
        </div>
      </div>
</container>


<br>
<br>
<div class="scrollItem">
  <table class="table table-hover table-responsive">
    <thead>
      <tr class="justify-content-center">
        <th scope="col">Nombre  <a href="dashboard"><img src="./img/sort_icon.png" alt="Ordenar alfabeticamente" width="20" heigth="20"></th>
        <th scope="col">Categoria</th>
        <th scope="col">Email</th>
        <th scope="col">Telefono</th>
        <th scope="col">Domicilio</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Estado de cuenta</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$customers item=customer}
    <tr class="justify-content-center">
      <th scope="row"><span>{$customer->name}</span></th>
      <td>{$customer->category_name}</td>
      <td>{$customer->email}</td>
      <td>{$customer->phone}</td>
      <td>{$customer->address}</td>
      <td>{$customer->city}</td>
      <td>{$customer->status}</td>
      <td>
          <form action="verPedidos" method="GET">
              <button type="submit" class="btn btn-outline-primary" name="guest_id" value="{$customer->id_customer}">Ver pedidos</button>
          </form>
      </td>
      </tr>
      {/foreach}
      </tbody>
  </table>
</div>
</section>