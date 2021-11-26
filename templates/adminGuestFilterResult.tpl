{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Buscar huésped</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="adminGuestFilter.tpl"}
<!--end add user menu-->
        </div>
      </div>
    </container>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">
          <form action="reserva" method="GET">
            <a href="javascript:history.back(-1);" class="btn btn-outline-primary">Volver</a>
          </form>
        </div>
      </div>
</container>
</section>




<section class="p-5 bg-light"> <!-- bg-light -->
<table class="table table-hover table-responsive">
  <thead>
    <tr class="justify-content-center">
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$DB_guests item=guest}
    <tr class="justify-content-center">
        <th scope="row"><span>{$guest->guest_lastname}, {$guest->guest_name}</span></th>
        <td>{$guest->email}</td>
        <td>{$guest->mobile}</td>
        <td>
            <form action="verReservas" method="GET">
                <button type="submit" class="btn btn-outline-primary" name="guest_id" value="{$guest->guest_id}">Ver reservas</button>
            </form>
        </td>
    </tr>
    {/foreach}
    </tbody>
</table>
</section>