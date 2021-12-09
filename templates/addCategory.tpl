
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <strong>Agregar categoría</strong>
        </h2>
              <div id="collapseFour" class="accordion-collapse collapse text-center" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <container class="text-center">
                      <div class="row">
                        <div class="col">
                            <form action="{$newCategory}" method="POST">
                                <div class="row">
                                    <div class="col">     
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Nombre de la categoría</label>
                                        <input type="text" name="input-name" class="form-control" placeholder="Ejemplo: {$example}" required>  
                                        <br>
                                    </div>
                                    <div class="col">
                                    </div>
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