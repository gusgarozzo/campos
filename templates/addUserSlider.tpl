<div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <strong>Agregar usuario</strong>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse text-center" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <container class="text-center">
                      <div class="row">
                        <div class="col">
                            <form action="agregarUsuario" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Nombre</label>
                                        <input type="text" name="input-name" class="form-control" required>       
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Apellido</label>
                                        <input type="text" name="input-lastname" class="form-control" required>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">E - mail</label>
                                        <input type="text" name="input-email" class="form-control" required>       
                                    </div>
                                    <div class="col">
                                        <label class="col-form-label mt-4" for="inputDefault">Constraseña</label>
                                        <br>
                                        <input type="password" name="input-password" class="form-control" required>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="alert alert-dismissible alert-primary">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    Recordá pedirle al usuario que modifique su contraseña cuando inicie sesión por primera vez
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
            </div>
          </div>