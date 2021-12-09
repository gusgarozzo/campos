{include file="header.tpl"}
<section class="p-4 text-center bg-light">
    <h2 class="mb-3">Editar stock de producto proveedor</h2>
    <br>

<div class="accordion-body">
<div class="row">
<container class="text-center">
                    <div class="row">
                        <div class="col">
                            <form action="setStock" method="POST">
                            {foreach from=$product item=item}
                                <div class="col">
                                    <input type="text" name="product_id" class="form-control" value="{$item->id_provider_product}" hidden>  
                                </div>
                            <div class="row">
                                <div class="col"></div>
                                    <div class="col">
                                    <label class="col-form-label mt-4" for="inputDefault">Nombre del producto</label>
                                    <input type="text" name="name" class="form-control" placeholder="{$item->product_name}" readonly>  
                                    <br>
                                </div>
                                <div class="col"></div>
                                </div>
                                <div class="row">
                                <div class="col"></div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Stock actual</label>
                                        <input type="number" name="stock" class="form-control" value="{$item->stock}" required>  
                                        <br>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Stock mínimo</label>
                                        <input type="number" name="min-stock" class="form-control" value="{$item->min_stock}">  
                                        <br>
                                    </div>
                                    {/foreach}
                                    <div class="col"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-primary">Editar</button>  
                                    </div> 
                                    
                                </div>
                            </form>
                        </div>
                      </div>
                        
                    </container>

