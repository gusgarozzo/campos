<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <strong>Buscar facturas</strong>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse text-center" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
            <div class="accordion-body">

                <container class="text-center bookingsSlider">
                <form action="billsFilterByNumber" method="GET">
                        <div class="row">
                        <div class="col">
                            </div>
                            <div class="col">
                                <label class="col-form-label mt-4" for="inputDefault">Por número de factura</label>
                                <input type="text" id="start" name="filter" class="form-control" placeholder="Ingrese número de factura">   
                                <br>  
                                <button type="submit" class="btn btn-outline-primary">Buscar</button>  
                            </div>
                            <div class="col">
                            </div>
                        <div>
                    </form>
                    <br>
                    <form action="billsFilterByDate" method="GET">
                    <div class="row">
                    <div class="col">
                            </div>
                        <div class="col">
                            <label class="col-form-label mt-4" for="inputDefault">Por fecha</label>
                            <input type="date" id="start" name="filter" class="form-control">     
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Buscar</button>    
                        </div>
                        <div class="col">
                            </div>
                    </div>
                </form>
                </container>
            </div>
        </div>
    </div>
</div>