{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Administrar proveedores</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="admProvidersFilter.tpl"}
<!--end add user menu-->
        </div>
      </div>
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="addProvider.tpl"}
<!--end add user menu-->
        </div>
      </div>
    <div class="row">
        <div class="col">

<!--add user menu-->   
<!--{include file="addCategory.tpl"}-->
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
</container>


<br>
<br>
<div class="scrollItem">
  <table class="table table-hover table-responsive">
    <thead>
      <tr class="justify-content-center">
        <th scope="col">Nombre  <a href="dashboard"><img src="./img/sort_icon.png" alt="Ordenar alfabeticamente" width="20" heigth="20"></th>
        <th scope="col">Email</th>
        <th scope="col">Telefono</th>
        <th scope="col">Domicilio</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Observaciones</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$providers item=provider}
    <tr class="justify-content-center">
      <th scope="row"><span>{$provider->name}</span></th>
      <td>{$provider->email}</td>
      <td>{$provider->phone}</td>
      <td>{$provider->address}</td>
      <td>{$provider->city}</td>
      <td>{$provider->comment}</td>
      <td>
          <form action="verReservas" method="GET">
              <button type="submit" class="btn btn-outline-primary" name="guest_id" value="{$provider->id_provider}">Ver pedidos</button>
          </form>
      </td>
      </tr>
      {/foreach}
      </tbody>
  </table>
</div>
</section>