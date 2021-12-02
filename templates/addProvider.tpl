<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <strong>Agregar proveedor</strong>
            </button>
        </h2>
              <div id="collapseTwo" class="accordion-collapse collapse text-center" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <container class="text-center">
                      <div class="row">
                        <div class="col">
                            <form action="newProvider" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Nombre</label>
                                        <input type="text" name="input-name" class="form-control" required>       
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">E - mail</label>
                                        <input type="text" name="input-email" class="form-control" required>       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Teléfono</label>
                                        <br>
                                        <input type="number" name="input-phone" class="form-control" required>
                                        <br>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Domicilio</label>
                                        <input type="text" name="input-address" class="form-control" required>       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Ciudad</label>
                                        <br>
                                        <input type="text" name="input-city" class="form-control" required>
                                        <br>
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Observaciones</label>
                                        <br>
                                        <input type="text" name="input-comment" class="form-control">
                                        <br>
                                    </div>
                                </div>
                                <!--<div class="row">
                                <div class="col">     
                                    </div>
                                    <div class="col">

                                    <label class="col-form-label mt-4" for="inputDefault">Categoría</label>
                                        <select name="category">
                                        {if $categories eq null}
                                            <option>Agregue una categoría...</option>
                                        {else}
                                            {foreach from=$categories item=category}
                                                <option value="{$category->id_cat_provider}">{$category->name}</option>
                                            {/foreach}
                                        {/if}
                                        </select>
                                    </div>
                                    <div class="col">
                    
                                    </div>
                                </div>-->
                                <br>
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