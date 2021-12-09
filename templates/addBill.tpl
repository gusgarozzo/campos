<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <strong>Agregar factura</strong>
            </button>
        </h2>
              <div id="collapseThree" class="accordion-collapse collapse text-center" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <container class="text-center">
                      <div class="row">
                        <div class="col">
                            <form action="newBill" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label mt-4" for="inputDefault">Proveedor</label>
                                            <select name="provider">
                                            {foreach from=$providers item=item}
                                                <option value="{$item->id_provider}">{$item->name}</option>
                                            {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <label class="col-form-label mt-4" for="inputDefault">N° de Factura</label>
                                            <input type="text" name="input-number" class="form-control" required>  
                                        </div>   
                                        <div class="col"></div>  
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col"></div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Fecha</label>
                                        <br>
                                        <input type="date" name="input-date" class="form-control" required>
                                        <br>
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="row">
                                <div class="col"></div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Estado:</label>
                                        <select name="status">
                                            <option value=true>Pagada</option>
                                            <option value=false>Impaga</option>
                                        </select>       
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="row">
                                <div class="col"></div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Observaciones</label>
                                        <br>
                                        <input type="text" name="input-comments" class="form-control" required>
                                        <br>
                                    </div>
                                    <div class="col"></div>
                                </div>
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