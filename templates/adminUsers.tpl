{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Administrar usuarios</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->
 {include file="addUserSlider.tpl"}
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
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Estado</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$users item=user}
    <tr class="justify-content-center">
        <th scope="row"><span>{$user->user_name}, {$user->user_lastname}</span></th>
        <td>{$user->email}</td>
        {if $user->status eq 1}
          <td>        
              <span class="badge bg-success">Habilitado</span>
          </td>
          <td>
              <form action="disableUser" method="GET">
                  <button type="submit" class="btn btn-outline-primary" name="user_id" value={$user->id_user}>Deshabilitar</button>
              </form>
          </td>
          {else}
          <td>
              <span class="badge bg-danger">Deshabilitado</span>
          </td>
          <td>
              <form action="enableUser" method="GET">
                  <button type="submit" class="btn btn-outline-primary" name="user_id" value={$user->id_user}>Habilitar</button>
              </form>
          </td>
          {/if}
      </tr>
      {/foreach}
      </tbody>
  </table>
</div>
</section>