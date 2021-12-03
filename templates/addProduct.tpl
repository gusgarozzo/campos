<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <strong>Agregar producto</strong>
        </h2>
              <div id="collapseThree" class="accordion-collapse collapse text-center" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <container class="text-center">
                      <div class="row">
                        <div class="col">
                            <form action="newProduct" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Nombre del Producto</label>
                                        <input type="text" name="name" class="form-control" required>  
                                        <br>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Stock</label>
                                        <input type="number" name="stock" class="form-control" required>  
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Stock mínimo</label>
                                        <input type="number" name="min-stock" class="form-control">  
                                        <br>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <br>
                                    <label class="col-form-label mt-4" for="inputDefault">Categoria</label>
                                    <select name="category" required>
                                        {if $categories eq null}
                                            <option>Agregue una categoria...</option>
                                        {else}
                                            {foreach from=$categories item=category}
                                                <option value="{$category->id_category_product}">{$category->category_name}</option>
                                            {/foreach}
                                        {/if}
                                        </select>
                                    </div>
                                    <div class="col">
                                    <br>
                                    <label class="col-form-label mt-4" for="inputDefault">Proveedor</label>
                                    <select name="provider" required>
                                        {if $providers eq null}
                                            <option>Agregue un proveedor...</option>
                                        {else}
                                            {foreach from=$providers item=provider}
                                                <option value="{$provider->id_provider}">{$provider->name}</option>
                                            {/foreach}
                                        {/if}
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-primary">Agregar</button>  
                                    </div> 
                                </div>
                            </form>
                        </div>
                      </div>
                    </container>
                </div>
              </div>