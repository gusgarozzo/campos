<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <strong>Buscar vendedores</strong>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse text-center" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
            <div class="accordion-body">

                <container class="text-center bookingsSlider">
                <form action="sellerFilter" method="POST">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label mt-4" for="inputDefault">Nombre</label>
                                <input type="text" id="start" name="input-name" class="form-control">       
                            </div>
                            <div class="col">
                                <label class="col-form-label mt-4" for="inputDefault">Apellido</label>
                                <input type="text" id="start" name="input-lastname" class="form-control">       
                            </div>
                            <div class="col">
                                <label class="col-form-label mt-4" for="inputDefault">E - mail</label>
                                <input type="text" id="start" name="input-email" class="form-control">       
                            </div>
                        <div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-primary">Buscar</button>  
                        </div> 
                    </div>
                </form>
                </container>
            </div>
        </div>
    </div>
</div>