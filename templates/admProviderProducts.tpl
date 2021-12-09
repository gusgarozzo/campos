{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Administrar productos proveedores</h2>
    <br>
    <container class="text-center">
      <div class="row">
        <div class="col">

<!--add user menu-->   
<!--{include file="admProvidersFilter.tpl"}-->
<!--end add user menu-->
        </div>
      </div>
      <div class="row">
        <div class="col">

        </div>
      </div>
    <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="addCategory.tpl"}
<!--end add user menu-->
        </div>
      </div>

    <div class="row">
        <div class="col">

<!--add user menu-->   
{include file="addProviderProduct.tpl"}
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
        <th scope="col">Stock</th>
        <th scope="col">Stock Minimo</th>
        <th scope="col">Categoría</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Acciones</th>
        <th scope="col"></th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$products item=product}
    <tr class="justify-content-center">
      <th scope="row"><span>{$product->product_name}</span></th>
      <td>{$product->stock}</td>
      <td>{if {$product->min_stock} eq NULL}
          ----
          {else}
              {$product->min_stock}
      {/if}
      </td>
      <td>{$product->category_name}</td>
      <td>{$product->name}</td>

      <td>
          <form action="setProvProdStock" method="GET">
              <button type="submit" class="btn btn-outline-primary" name="product_id" value="{$product->id_provider_product}">Editar stock</button>
          </form>
      </td>
    {if $product->status eq 1}
      <td>
          <form action="disableProduct" method="GET">
              <button type="submit" class="btn btn-outline-primary" name="product_id" value="{$product->id_provider_product}">Deshabilitar</button>
          </form>
      </td>
      <td>        
              <span class="badge bg-success">Habilitado</span>
          </td>
      {else}

        <td>
          <form action="enableProduct" method="GET">
              <button type="submit" class="btn btn-outline-primary" name="product_id" value="{$product->id_provider_product}">Habilitar</button>
          </form>
      </td>
              <td>
              <span class="badge bg-danger">Deshabilitado</span>
          </td>
    {/if}
      </tr>
      {/foreach}
      </tbody>
  </table>
</div>
</section>